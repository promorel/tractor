<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandImage;
use App\Http\Requests\StoreBrandImageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandImageController extends Controller
{
    /**
     * Display brand images management page
     */
    public function index(Brand $brand): View
    {
        $brand->load('brandImages', 'product');
        
        return view('admin.brand-images.index', compact('brand'));
    }

    /**
     * Store newly uploaded images from URLs
     */
    public function store(StoreBrandImageRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();

        // Check image limit
        $currentCount = $brand->brandImages()->count();
        
        // Filter out empty URLs
        $imageUrls = array_filter($validated['image_urls'], fn($url) => !empty($url));
        $newImagesCount = count($imageUrls);
        
        if ($currentCount + $newImagesCount > 6) {
            $remaining = 6 - $currentCount;
            return back()->with('error', "Maximum 6 images par marque. Il reste {$remaining} emplacements disponibles.");
        }

        if (empty($imageUrls)) {
            return back()->with('error', 'Veuillez fournir au moins une URL d\'image valide.');
        }

        $brandSlug = \Str::slug($brand->brand_name);
        $productSlug = \Str::slug($brand->product->name);
        
        // Create brand-specific folder
        $path = public_path('assets/images/products/' . $brandSlug);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Download and store images
        $successCount = 0;
        $counter = $currentCount + 1;
        
        foreach ($imageUrls as $imageUrl) {
            $imagePath = $this->downloadAndStoreImage($imageUrl, $productSlug, $brandSlug, "gallery-{$counter}");
            
            if ($imagePath && $imagePath !== 'assets/images/products/default.png') {
                BrandImage::create([
                    'brand_id' => $brand->id,
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
            ->route('admin.brand-images.index', $brand)
            ->with('success', "{$successCount} image(s) téléchargée(s) et ajoutée(s) avec succès !");
    }

    /**
     * Download and store image from URL (same logic as ProductController)
     */
    protected function downloadAndStoreImage(?string $imageUrl, string $productSlug, ?string $brandSlug = null, string $type = 'gallery'): ?string
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

            // Build folder path
            $folderPath = 'assets/images/products';
            if ($brandSlug) {
                $folderPath .= '/' . $brandSlug;
            }

            // Create folder if not exists
            $fullPath = public_path($folderPath);
            if (!\Illuminate\Support\Facades\File::exists($fullPath)) {
                \Illuminate\Support\Facades\File::makeDirectory($fullPath, 0755, true);
            }

            // Generate SEO-friendly filename
            $timestamp = time();
            if ($brandSlug) {
                $filename = "{$productSlug}-{$brandSlug}-{$type}-{$timestamp}.{$extension}";
            } else {
                $filename = "{$productSlug}-{$type}-{$timestamp}.{$extension}";
            }

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

        // Delete file from storage
        $imagePath = public_path($brandImage->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $brandImage->delete();

        return redirect()
            ->route('admin.brand-images.index', $brand)
            ->with('success', 'Image supprimée avec succès !');
    }
}
