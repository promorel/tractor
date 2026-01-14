<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SparepartsController extends Controller
{
    /**
     * Display the spareparts and stickers page
     */
    public function index()
    {
        $allProducts = config('spareparts');
        
        $spareparts = collect($allProducts['spareparts']);
        $stickers = collect($allProducts['stickers']);

        return view('spareparts', compact('spareparts', 'stickers'));
    }

    /**
     * Add sparepart to cart via AJAX
     */
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'sparepart_id' => 'required|string',
            'quantity' => 'required|integer|min:1|max:100',
        ]);

        // Récupérer le produit depuis la config
        $allProducts = config('spareparts');
        $allItems = array_merge($allProducts['spareparts'], $allProducts['stickers']);
        
        $sparepart = collect($allItems)->firstWhere('id', $validated['sparepart_id']);

        if (!$sparepart) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Vérifier le stock
        if ($sparepart['stock'] < $validated['quantity']) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock'
            ], 400);
        }

        // Récupérer ou créer le panier
        $cart = \App\Models\Cart::getOrCreate();

        // Vérifier si l'item existe déjà (on stocke l'ID string dans un champ)
        $cartItem = $cart->items()
            ->where('sparepart_id', $validated['sparepart_id'])
            ->first();

        if ($cartItem) {
            // Mettre à jour la quantité
            $newQuantity = $cartItem->quantity + $validated['quantity'];
            
            if ($sparepart['stock'] < $newQuantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient stock for this quantity'
                ], 400);
            }

            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            // Créer un nouvel item avec sparepart_id comme string dans notes
            \App\Models\CartItem::create([
                'cart_id' => $cart->id,
                'sparepart_id' => $validated['sparepart_id'], // Stocker l'ID string
                'price' => $sparepart['price'],
                'quantity' => $validated['quantity'],
            ]);
        }

        // Recharger le panier
        $cart->load('items');

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart' => [
                'total_items' => $cart->getTotalItems(),
                'total' => number_format($cart->getTotal(), 2),
            ],
            'html' => view('partials.cart-content', ['cart' => $cart])->render()
        ]);
    }

    /**
     * Helper method to get sparepart by ID
     */
    public static function getSparepartById($id)
    {
        $allProducts = config('spareparts');
        $allItems = array_merge($allProducts['spareparts'], $allProducts['stickers']);
        
        return collect($allItems)->firstWhere('id', $id);
    }
}

