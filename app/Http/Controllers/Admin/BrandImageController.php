<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\BrandImage;
use App\Http\Requests\StoreBrandImageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandImageController extends Controller
{
    /**
     * Display brand images management page
     */
    public function index(Product $product, Brand $brand): View
    {
        // Vérifier que la marque est associée à ce produit
        if (!$product->brands()->where('brand_id', $brand->id)->exists()) {
            abort(404, 'Cette marque n\'est pas associée à ce produit.');
        }
        
        // Charger uniquement les images pour cette combinaison produit-marque
        $brand->load(['brandImages' => function($query) use ($product) {
            $query->where('product_id', $product->id);
        }]);
        
        return view('admin.brand-images.index', compact('brand', 'product'));
    }

    /**
     * Store newly uploaded images from URLs
     */
    public function store(StoreBrandImageRequest $request, Product $product, Brand $brand): RedirectResponse
    {
        // Vérifier que la marque est associée à ce produit
        if (!$product->brands()->where('brand_id', $brand->id)->exists()) {
            return back()->with('error', 'Cette marque n\'est pas associée à ce produit.');
        }
        
        $validated = $request->validated();

        // Compter les images existantes pour cette combinaison produit-marque
        $currentCount = $brand->brandImages()->where('product_id', $product->id)->count();
        
        // Filter out empty URLs
        $imageUrls = array_filter($validated['image_urls'], fn($url) => !empty($url));

        if (empty($imageUrls)) {
            return back()->with('error', 'Veuillez fournir au moins une URL d\'image valide.');
        }

        $brandSlug = \Str::slug($brand->brand_name);
        $productSlug = \Str::slug($product->name);
        $combinedSlug = $productSlug . '-' . $brandSlug;
        
        // Create product-brand-specific folder
        $path = public_path('assets/images/products/' . $combinedSlug);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Download and store images
        $successCount = 0;
        $counter = $currentCount + 1;
        
        foreach ($imageUrls as $imageUrl) {
            $imagePath = $this->downloadAndStoreImage($imageUrl, $productSlug, $brandSlug, $combinedSlug, "image-{$counter}");
            
            if ($imagePath && $imagePath !== 'assets/images/products/default.png') {
                BrandImage::create([
                    'brand_id' => $brand->id,
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
                
                $successCount++;
                $counter++;
            }
        }

        if ($successCount === 0) {
            return back()->with('error', 'Échec du téléchargement des images. Vérifiez les URLs fournies.');
        }

        return redirect()
            ->route('admin.brand-images.index.for.product', [$product, $brand])
            ->with('success', "{$successCount} image(s) téléchargée(s) et ajoutée(s) avec succès pour {$product->name} - {$brand->brand_name} !");
    }

    /**
     * Download and store image from URL with unique slug for product-brand combination
     */
    protected function downloadAndStoreImage(?string $imageUrl, string $productSlug, string $brandSlug, string $combinedSlug, string $type = 'image'): ?string
    {
        if (empty($imageUrl)) {
            return null;
        }

        try {
            $response = \Illuminate\Support\Facades\Http::timeout(10)->get($imageUrl);

            if (!$response->successful()) {
                \Illuminate\Support\Facades\Log::warning("Échec du téléchargement de l'image : {$imageUrl}");
                return null;
            }

            // Determine image extension
            $contentType = $response->header('Content-Type');
            $extension = match($contentType) {
                'image/jpeg', 'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
                'image/gif' => 'gif',
                default => null
            };

            if (!$extension) {
                $urlExtension = strtolower(pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION));
                $extension = in_array($urlExtension, ['jpg', 'jpeg', 'png', 'webp', 'gif']) ? $urlExtension : 'jpg';
            }

            // Build folder path with combined slug (product-brand)
            $folderPath = 'assets/images/products/' . $combinedSlug;

            // Create folder if not exists
            $fullPath = public_path($folderPath);
            if (!\Illuminate\Support\Facades\File::exists($fullPath)) {
                \Illuminate\Support\Facades\File::makeDirectory($fullPath, 0755, true);
            }

            // Generate SEO-friendly filename with combined slug
            $timestamp = time();
            $randomId = \Str::random(6);
            $filename = "{$combinedSlug}-{$type}-{$timestamp}-{$randomId}.{$extension}";

            // Save image
            $fullFilePath = $fullPath . '/' . $filename;
            \Illuminate\Support\Facades\File::put($fullFilePath, $response->body());

            return $folderPath . '/' . $filename;

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Erreur lors du téléchargement de l'image : " . $e->getMessage(), [
                'url' => $imageUrl,
                'product_slug' => $productSlug,
                'brand_slug' => $brandSlug,
            ]);

            return null;
        }
    }

    /**
     * Remove the specified image
     */
    public function destroy(BrandImage $brandImage): RedirectResponse
    {
        $brand = $brandImage->brand;
        $product = $brandImage->product;

        // Delete file from storage
        $imagePath = public_path($brandImage->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $brandImage->delete();

        return redirect()
            ->route('admin.brand-images.index.for.product', [$product, $brand])
            ->with('success', 'Image supprimée avec succès !');
    }
}
