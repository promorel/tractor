<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            // Déchiffrer l'ID
            $productId = decrypt($encryptedId);
            
            // Récupérer le produit
            $product = Product::findOrFail($productId);
            
            // Charger le produit avec ses marques et images associées
            $product->load(['brands' => function ($query) {
                $query->with('brandImages');
            }]);

            return view('product-details', compact('product'));
        } catch (\Exception $e) {
            abort(404, 'Produit introuvable');
        }
    }
}
