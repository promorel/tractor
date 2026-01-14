<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Télécharge et enregistre une image depuis une URL
     * 
     * @param string|null $imageUrl URL de l'image à télécharger
     * @param string $productSlug Slug du produit
     * @param string|null $brandSlug Slug de la marque (optionnel)
     * @param string $type Type d'image (main, gallery, logo)
     * @return string|null Chemin relatif de l'image ou null si échec
     */
    protected function downloadAndStoreImage(?string $imageUrl, string $productSlug, ?string $brandSlug = null, string $type = 'main'): ?string
    {
        // Si aucune URL fournie, utiliser l'image par défaut
        if (empty($imageUrl)) {
            return 'assets/images/products/default.png';
        }

        try {
            // Télécharger l'image via HTTP
            $response = Http::timeout(10)->get($imageUrl);

            // Vérifier si le téléchargement a réussi
            if (!$response->successful()) {
                Log::warning("Échec du téléchargement de l'image : {$imageUrl}");
                return 'assets/images/products/default.png';
            }

            // Déterminer l'extension de l'image
            $contentType = $response->header('Content-Type');
            $extension = match($contentType) {
                'image/jpeg', 'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
                'image/gif' => 'gif',
                default => null
            };

            // Si l'extension n'est pas valide, essayer depuis l'URL
            if (!$extension) {
                $urlExtension = strtolower(pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION));
                $extension = in_array($urlExtension, ['jpg', 'jpeg', 'png', 'webp', 'gif']) ? $urlExtension : 'jpg';
            }

            // Construire le chemin du dossier
            $folderPath = 'assets/images/products';
            if ($brandSlug) {
                $folderPath .= '/' . $brandSlug;
            }

            // Créer le dossier s'il n'existe pas
            $fullPath = public_path($folderPath);
            if (!File::exists($fullPath)) {
                File::makeDirectory($fullPath, 0755, true);
            }

            // Générer le nom de fichier SEO-friendly
            // Format: produit-slug-marque-slug-type-timestamp.ext
            $timestamp = time();
            if ($brandSlug) {
                $filename = "{$productSlug}-{$brandSlug}-{$type}-{$timestamp}.{$extension}";
            } else {
                $filename = "{$productSlug}-{$type}-{$timestamp}.{$extension}";
            }

            // Enregistrer l'image
            $fullFilePath = $fullPath . '/' . $filename;
            File::put($fullFilePath, $response->body());

            // Retourner le chemin relatif
            return $folderPath . '/' . $filename;

        } catch (\Exception $e) {
            // Logger l'erreur sans bloquer l'enregistrement du produit
            Log::error("Erreur lors du téléchargement de l'image : " . $e->getMessage(), [
                'url' => $imageUrl,
                'product_slug' => $productSlug,
                'brand_slug' => $brandSlug,
            ]);

            return 'assets/images/products/default.png';
        }
    }

    /**
     * Display a listing of products
     */
    public function index(): View
    {
        $products = Product::withCount('brands')->latest()->paginate(15);
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Générer le slug du produit pour le nommage SEO
        $productSlug = Str::slug($request->name);

        // Télécharger et enregistrer l'image principale depuis l'URL
        if (!empty($request->main_image_url)) {
            $validated['main_image'] = $this->downloadAndStoreImage(
                $request->main_image_url,
                $productSlug,
                null,
                'main'
            );
        } else {
            $validated['main_image'] = 'assets/images/products/default.png';
        }

        $product = Product::create($validated);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Produit créé avec succès !');
    }

    /**
     * Display the specified product
     */
    public function show(Product $product): View
    {
        // Charger les marques avec leurs images filtrées par produit
        $product->load(['brands' => function($query) use ($product) {
            $query->with(['brandImages' => function($q) use ($product) {
                $q->where('product_id', $product->id);
            }]);
        }]);
        
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        // Générer le slug du produit pour le nommage SEO
        $productSlug = Str::slug($request->name);

        // Télécharger et enregistrer une nouvelle image si une URL est fournie
        if (!empty($request->main_image_url)) {
            // Supprimer l'ancienne image si ce n'est pas l'image par défaut
            $oldImagePath = public_path($product->main_image);
            if (file_exists($oldImagePath) && $product->main_image !== 'assets/images/products/default.png') {
                unlink($oldImagePath);
            }
            
            $validated['main_image'] = $this->downloadAndStoreImage(
                $request->main_image_url,
                $productSlug,
                null,
                'main'
            );
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Produit mis à jour avec succès !');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product): RedirectResponse
    {
        // Delete main image
        $mainImagePath = public_path($product->main_image);
        if (file_exists($mainImagePath)) {
            unlink($mainImagePath);
        }

        // Delete all brand images and logos
        foreach ($product->brands as $brand) {
            $logoPath = public_path($brand->logo);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
            
            foreach ($brand->brandImages as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produit supprimé avec succès !');
    }
}
