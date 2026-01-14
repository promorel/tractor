<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of all products
     */
    public function index(): View
    {
        // Récupérer tous les produits avec optimisation des requêtes
        $products = Product::with('brands', 'brands.brandImages')->get();

        return view('products', compact('products'));
    }

    /**
     * Display a specific product with its brands and images
     */
    public function show(string $encryptedId): View
    {
        try {
            // Essayer de déchiffrer l'ID, sinon utiliser l'ID tel quel
            try {
                $productId = decrypt($encryptedId);
            } catch (\Exception $e) {
                // Si le déchiffrement échoue, utiliser l'ID tel quel (nombre)
                $productId = $encryptedId;
            }
            
            // Récupérer le produit
            $product = Product::findOrFail($productId);
            
            // Récupérer l'ID de la marque sélectionnée depuis l'URL
            $selectedBrandId = request()->get('brand');
            
            // Charger le produit avec ses marques
            if ($selectedBrandId) {
                // Si une marque est sélectionnée, charger uniquement ses images
                $product->load(['brands' => function ($query) use ($product, $selectedBrandId) {
                    $query->with(['brandImages' => function($q) use ($product, $selectedBrandId) {
                        $q->where('product_id', $product->id)
                          ->where('brand_id', $selectedBrandId);
                    }]);
                }]);
                
                // Mettre la marque sélectionnée en premier
                $brands = $product->brands->sortBy(function($brand) use ($selectedBrandId) {
                    return $brand->id == $selectedBrandId ? 0 : 1;
                });
                $product->setRelation('brands', $brands);
            } else {
                // Aucune marque sélectionnée, charger les images de la première marque seulement
                $product->load(['brands' => function ($query) use ($product) {
                    $query->with(['brandImages' => function($q) use ($product) {
                        $q->where('product_id', $product->id);
                    }]);
                }]);
            }
            
            // Charger les prix par poids pour ce produit
            $weightPrices = DB::table('product_weight_prices')
                ->where('product_id', $product->id)
                ->orderBy('weight', 'asc')
                ->get();

            return view('product-details', compact('product', 'selectedBrandId', 'weightPrices'));
        } catch (\Exception $e) {
            abort(404, 'Produit introuvable');
        }
    }
}
