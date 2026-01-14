<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Show the form for creating a new brand (assigning to product)
     */
    public function create(?Product $product = null): View|RedirectResponse
    {
        // Check brand limit
        if ($product && $product->brands()->count() >= 18) {
            return back()->with('error', 'Maximum 18 marques par produit atteint !');
        }

        $products = Product::orderBy('name')->get();
        
        // Get brands that are NOT already assigned to THIS specific product
        if ($product) {
            // Récupérer les IDs des marques déjà associées à ce produit
            $assignedBrandIds = $product->brands()->pluck('brands.id')->toArray();
            
            // Récupérer toutes les marques sauf celles déjà associées
            $availableBrands = Brand::whereNotIn('id', $assignedBrandIds)
                ->orderBy('brand_name')
                ->get();
        } else {
            // If no product specified, show all brands
            $availableBrands = Brand::orderBy('brand_name')->get();
        }
        
        return view('admin.brands.create', compact('products', 'product', 'availableBrands'));
    }

    /**
     * Assign brands to product (multiple brands at once)
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Check brand limit for product
        $product = Product::findOrFail($validated['product_id']);
        $currentBrandsCount = $product->brands()->count();
        $newBrandsCount = count($validated['brand_ids']);
        
        if ($currentBrandsCount + $newBrandsCount > 18) {
            $remainingSlots = 18 - $currentBrandsCount;
            return back()
                ->withInput()
                ->with('error', "Vous ne pouvez ajouter que {$remainingSlots} marque(s) supplémentaire(s). Maximum 18 marques par produit.");
        }

        $successCount = 0;
        $skippedBrands = [];

        foreach ($validated['brand_ids'] as $brandId) {
            // Get the existing brand
            $brand = Brand::findOrFail($brandId);
            
            // Check if brand is already assigned to this product (via pivot table)
            if ($product->brands()->where('brand_id', $brandId)->exists()) {
                $skippedBrands[] = $brand->brand_name;
                continue;
            }

            // Attach brand to product with price and stock in pivot table
            $product->brands()->attach($brandId, [
                'price' => $validated['price'],
                'stock' => $validated['stock'],
            ]);

            // Create brand-specific images folder
            $brandSlug = \Str::slug($brand->brand_name);
            $brandImagePath = public_path('assets/images/products/' . $brandSlug);
            if (!file_exists($brandImagePath)) {
                mkdir($brandImagePath, 0755, true);
            }

            $successCount++;
        }

        $message = "$successCount marque(s) associée(s) au produit avec succès !";
        if (!empty($skippedBrands)) {
            $message .= " Marques déjà associées ignorées : " . implode(', ', $skippedBrands);
        }

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', $message);
    }

    /**
     * Show the form for editing the brand for a specific product
     */
    public function edit(Product $product, Brand $brand): View
    {
        // Vérifier que la marque est associée à ce produit
        $pivotData = $product->brands()->where('brand_id', $brand->id)->first();
        
        if (!$pivotData) {
            abort(404, 'Cette marque n\'est pas associée à ce produit.');
        }
        
        return view('admin.brands.edit', compact('brand', 'product', 'pivotData'));
    }

    /**
     * Update the brand's price and stock for a specific product
     */
    public function update(UpdateBrandRequest $request, Product $product, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();

        // Vérifier que la marque est associée à ce produit
        if (!$product->brands()->where('brand_id', $brand->id)->exists()) {
            return back()->with('error', 'Cette marque n\'est pas associée à ce produit.');
        }

        // Mettre à jour les données du pivot pour ce produit
        $product->brands()->updateExistingPivot($brand->id, [
            'price' => $validated['price'] ?? null,
            'stock' => $validated['stock'] ?? null,
        ]);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Marque mise à jour avec succès !');
    }

    /**
     * Detach brand from a specific product
     */
    public function detachFromProduct(Product $product, Brand $brand): RedirectResponse
    {
        // Vérifier que la marque est associée à ce produit
        if (!$product->brands()->where('brand_id', $brand->id)->exists()) {
            return back()->with('error', 'Cette marque n\'est pas associée à ce produit.');
        }

        // Supprimer uniquement les images de cette combinaison produit-marque
        $images = $brand->brandImages()->where('product_id', $product->id)->get();
        foreach ($images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        // Détacher la marque du produit (supprime l'entrée dans la table pivot)
        $product->brands()->detach($brand->id);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Marque dissociée du produit avec succès !');
    }

    /**
     * Delete a brand completely (not just detach from product)
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        // Récupérer le premier produit pour la redirection
        $product = $brand->products()->first();

        // Supprimer toutes les images
        foreach ($brand->brandImages as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        // Détacher de tous les produits
        $brand->products()->detach();

        // Supprimer le logo
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }

        // Supprimer la marque
        $brand->delete();

        if ($product) {
            return redirect()
                ->route('admin.products.show', $product)
                ->with('success', 'Marque complètement supprimée !');
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Marque complètement supprimée !');
    }
}
