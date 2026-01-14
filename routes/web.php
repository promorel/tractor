<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\BrandImageController as AdminBrandImageController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController;

// ⚠️ DANGER : Routes d'administration Artisan - À SUPPRIMER EN PRODUCTION ⚠️
Route::get('/run-migrations', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations exécutées avec succès !';
});

Route::get('/run-seeder', function () {
    Artisan::call('db:seed', ['--force' => true]);
    return 'Seeders exécutés avec succès !';
});

Route::get('/optimize-clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Tous les caches ont été nettoyés !';
});
// ⚠️ FIN DES ROUTES DANGEREUSES ⚠️

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product-details/{encryptedId}', [ProductController::class, 'show'])->name('product-details');

// Route des pièces détachées et stickers
Route::get('/spareparts', [App\Http\Controllers\SparepartsController::class, 'index'])->name('spareparts');
Route::post('/spareparts/add-to-cart', [App\Http\Controllers\SparepartsController::class, 'addToCart'])->name('spareparts.addToCart');

// Routes du panier
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/get', [CartController::class, 'getCart'])->name('cart.get');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Routes du checkout (paiement hors plateforme) - Sans authentification
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/confirm-payment/{order}', [CheckoutController::class, 'confirmPayment'])->name('checkout.confirmPayment');

// Routes des commandes utilisateur
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
});

Route::get('/features', function () {
    return view('features');
})->name('features');
Route::get('/why', function () {
    return view('why');
})->name('why');
Route::get('/crash-test', function () {
    return view('crash-test');
})->name('crash-test');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route pour traiter le formulaire de contact
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// Mentions légales et CGV
Route::get('/legal-notice', function () {
    return view('legal-notice');
})->name('legal-notice');

Route::get('/cgv', function () {
    return view('cgv');
})->name('cgv');

Route::get('/photos/fendt', function () {
    return view('photos.fendt');
})->name('photos.fendt');

Route::get('/photos/john-deere', function () {
    return view('photos.john-deere');
})->name('photos.john-deere');

Route::get('/photos/new-holland', function () {
    return view('photos.new-holland');
})->name('photos.new-holland');

Route::get('/photos/deutz-fahr', function () {
    return view('photos.deutz-fahr');
})->name('photos.deutz-fahr');

Route::get('/photos/case-ih', function () {
    return view('photos.case-ih');
})->name('photos.case-ih');

Route::get('/photos/massey-ferguson', function () {
    return view('photos.massey-ferguson');
})->name('photos.massey-ferguson');

Route::get('/photos/claas', function () {
    return view('photos.claas');
})->name('photos.claas');

Route::get('/photos/valtra', function () {
    return view('photos.valtra');
})->name('photos.valtra');

Route::get('/photos/steyr', function () {
    return view('photos.steyr');
})->name('photos.steyr');

Route::get('/photos/kubota', function () {
    return view('photos.kubota');
})->name('photos.kubota');

Route::get('/photos/jcb', function () {
    return view('photos.jcb');
})->name('photos.jcb');

Route::get('/photos/mb-trac', function () {
    return view('photos.mb-trac');
})->name('photos.mb-trac');

Route::get('/photos/mccormick', function () {
    return view('photos.mccormick');
})->name('photos.mccormick');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Routes - Protected
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard Admin
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Products Management
        Route::resource('products', AdminProductController::class);

        // Brands Management
        Route::resource('brands', AdminBrandController::class)->except(['index', 'show', 'edit', 'update', 'destroy']);
        Route::get('products/{product}/brands/create', [AdminBrandController::class, 'create'])
            ->name('brands.create.for.product');
        Route::get('products/{product}/brands/{brand}/edit', [AdminBrandController::class, 'edit'])
            ->name('brands.edit.for.product');
        Route::put('products/{product}/brands/{brand}', [AdminBrandController::class, 'update'])
            ->name('brands.update.for.product');
        Route::delete('products/{product}/brands/{brand}', [AdminBrandController::class, 'detachFromProduct'])
            ->name('brands.detach');

        // Brand Images Management
        Route::get('products/{product}/brands/{brand}/images', [AdminBrandImageController::class, 'index'])
            ->name('brand-images.index.for.product');
        Route::post('products/{product}/brands/{brand}/images', [AdminBrandImageController::class, 'store'])
            ->name('brand-images.store.for.product');
        Route::delete('brand-images/{brandImage}', [AdminBrandImageController::class, 'destroy'])
            ->name('brand-images.destroy');

        // Orders Management (paiement hors plateforme)
        Route::get('commandes', [AdminOrderController::class, 'commandes'])->name('commandes');
        Route::get('commandes/{order}', [AdminOrderController::class, 'show'])->name('commandes.show');
        Route::post('commandes/{order}/validate', [AdminOrderController::class, 'markAsPaid'])->name('commandes.validate');
        Route::post('commandes/{order}/reject', [AdminOrderController::class, 'rejectPayment'])->name('commandes.reject');
        Route::get('commandes/{order}/download-proof', [AdminOrderController::class, 'downloadProof'])->name('commandes.downloadProof');
        
        // Old routes (for backward compatibility)
        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::post('orders/{order}/mark-as-paid', [AdminOrderController::class, 'markAsPaid'])->name('orders.markAsPaid');
        Route::post('orders/{order}/reject-payment', [AdminOrderController::class, 'rejectPayment'])->name('orders.rejectPayment');
        Route::get('orders/{order}/download-proof', [AdminOrderController::class, 'downloadProof'])->name('orders.downloadProof');
    });
});
