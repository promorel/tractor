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
        // Get only brands that are not yet assigned to any product
        $availableBrands = Brand::whereNull('product_id')
            ->orderBy('brand_name')
            ->get();
        
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
            
            // Check if brand is already assigned to this product
            if ($brand->product_id == $product->id) {
                $skippedBrands[] = $brand->brand_name;
                continue;
            }

            // Update brand with product association, price and stock
            $brand->update([
                'product_id' => $validated['product_id'],
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
     * Show the form for editing the specified brand
     */
    public function edit(Brand $brand): View
    {
        $products = Product::orderBy('name')->get();
        
        return view('admin.brands.edit', compact('brand', 'products'));
    }

    /**
     * Update the specified brand (price and stock only)
     */
    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();

        $brand->update($validated);

        return redirect()
            ->route('admin.products.show', $brand->product)
            ->with('success', 'Marque mise à jour avec succès !');
    }

    /**
     * Detach brand from product (set product_id to null, keep price/stock)
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $product = $brand->product;

        // Delete all brand images from this product
        $brandSlug = \Str::slug($brand->brand_name);
        $brandImagePath = public_path('assets/images/products/' . $brandSlug);
        
        foreach ($brand->brandImages as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        // Detach brand from product (do NOT delete brand or logo)
        $brand->update([
            'product_id' => null,
            'price' => null,
            'stock' => null,
        ]);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Marque dissociée du produit avec succès !');
    }
}
