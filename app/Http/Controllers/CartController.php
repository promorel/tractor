<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Ajouter un produit au panier (AJAX)
     */
    public function add(Request $request): JsonResponse
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'brand_id' => 'required|exists:brands,id',
            'quantity' => 'nullable|integer|min:1|max:100',
            'weight' => 'nullable|integer',
            'selected_price' => 'nullable|numeric|min:0',
        ], [
            'product_id.required' => 'Le produit est requis',
            'product_id.exists' => 'Le produit n\'existe pas',
            'brand_id.required' => 'La marque est requise',
            'brand_id.exists' => 'La marque n\'existe pas',
            'quantity.integer' => 'La quantité doit être un nombre entier',
            'quantity.min' => 'La quantité minimale est 1',
            'quantity.max' => 'La quantité maximale est 100',
            'weight.integer' => 'Le poids doit être un nombre entier',
            'selected_price.numeric' => 'Le prix doit être un nombre',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Données invalides: ' . $validator->errors()->first(),
                'errors' => $validator->errors(),
                'received_data' => $request->all()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Récupérer le produit et la marque
            $product = Product::findOrFail($request->product_id);
            $brand = Brand::findOrFail($request->brand_id);

            // Vérifier le stock
            if ($brand->stock < ($request->quantity ?? 1)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stock insuffisant'
                ], 400);
            }

            // Récupérer ou créer le panier
            $cart = Cart::getOrCreate();

            // Récupérer le poids et le prix sélectionné
            $weight = $request->weight;
            $selectedPrice = $request->selected_price;
            
            // Utiliser le prix sélectionné ou le prix de la marque
            $finalPrice = $selectedPrice ?? $brand->final_price;

            // Vérifier si l'item existe déjà (avec le même poids)
            $cartItem = $cart->items()
                ->where('product_id', $product->id)
                ->where('brand_id', $brand->id)
                ->where(function($query) use ($weight) {
                    if ($weight) {
                        $query->where('weight', $weight);
                    } else {
                        $query->whereNull('weight');
                    }
                })
                ->first();

            $quantity = $request->quantity ?? 1;

            if ($cartItem) {
                // Mettre à jour la quantité
                $newQuantity = $cartItem->quantity + $quantity;
                
                // Vérifier le stock pour la nouvelle quantité
                if ($brand->stock < $newQuantity) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Stock insuffisant pour cette quantité'
                    ], 400);
                }

                $cartItem->quantity = $newQuantity;
                $cartItem->save();
            } else {
                // Créer un nouvel item
                $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'brand_id' => $brand->id,
                    'price' => $brand->final_price,
                    'quantity' => $quantity,
                    'weight' => $weight,
                    'selected_price' => $selectedPrice,
                ]);
            }

            DB::commit();

            // Retourner les données mises à jour avec eager loading
            $cart->load(['items.product', 'items.brand.brandImages']);
            
            return response()->json([
                'success' => true,
                'message' => 'Produit ajouté au panier',
                'cart' => [
                    'total_items' => $cart->getTotalItems(),
                    'total' => number_format($cart->getTotal(), 2),
                ],
                'html' => view('partials.cart-content', ['cart' => $cart])->render()
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue'
            ], 500);
        }
    }

    /**
     * Mettre à jour la quantité d'un item (AJAX)
     */
    public function updateQuantity(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Données invalides',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $cart = Cart::getOrCreate();
            $cartItem = CartItem::where('id', $request->item_id)
                ->where('cart_id', $cart->id)
                ->firstOrFail();

            // Vérifier le stock
            if ($cartItem->brand->stock < $request->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stock insuffisant'
                ], 400);
            }

            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            
            // Recharger avec les relations
            $cart->load(['items.product', 'items.brand.brandImages']);

            return response()->json([
                'success' => true,
                'message' => 'Quantité mise à jour',
                'cart' => [
                    'total_items' => $cart->getTotalItems(),
                    'total' => number_format($cart->getTotal(), 2),
                ],
                'item' => [
                    'subtotal' => number_format($cartItem->getSubtotal(), 2)
                ],
                'html' => view('partials.cart-content', ['cart' => $cart])->render()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Item introuvable'
            ], 404);
        }
    }

    /**
     * Supprimer un item du panier (AJAX)
     */
    public function remove(Request $request, $itemId): JsonResponse
    {
        try {
            $cart = Cart::getOrCreate();
            $cartItem = CartItem::where('id', $itemId)
                ->where('cart_id', $cart->id)
                ->firstOrFail();

            $cartItem->delete();
            
            // Recharger avec les relations
            $cart->load(['items.product', 'items.brand.brandImages']);

            return response()->json([
                'success' => true,
                'message' => 'Article supprimé',
                'cart' => [
                    'total_items' => $cart->getTotalItems(),
                    'total' => number_format($cart->getTotal(), 2),
                ],
                'html' => view('partials.cart-content', ['cart' => $cart])->render()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Item introuvable'
            ], 404);
        }
    }

    /**
     * Récupérer le contenu du panier (AJAX)
     */
    public function getCart(): JsonResponse
    {
        $cart = Cart::getOrCreate();
        
        // Charger les relations nécessaires pour éviter les N+1 queries
        $cart->load(['items.product', 'items.brand.brandImages']);

        return response()->json([
            'success' => true,
            'cart' => [
                'total_items' => $cart->getTotalItems(),
                'total' => number_format($cart->getTotal(), 2),
            ],
            'html' => view('partials.cart-content', ['cart' => $cart])->render()
        ]);
    }

    /**
     * Afficher la page du panier
     */
    public function index()
    {
        $cart = Cart::getOrCreate();
        $cart->load(['items.product', 'items.brand.brandImages']);
        return view('cart.index', compact('cart'));
    }
}
