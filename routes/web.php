<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Catalogue produits NovaStyle (public)
|--------------------------------------------------------------------------
*/
Route::get('/produits', [ProductController::class, 'index'])->name('products.index');
Route::get('/produits/{slug}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Contact (public)
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/livraison', function () { return view('pages.livraison'); })->name('livraison');
Route::get('/cgv', function () { return view('pages.cgv'); })->name('cgv');
Route::get('/mentions-legales', function () { return view('pages.mentions'); })->name('mentions');

/*
|--------------------------------------------------------------------------
| Panier, commande, historique, paiement (client connecté)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
    Route::post('/panier/ajouter/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/panier/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/panier/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/commande', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/commande', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/mes-commandes', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/mes-commandes/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/paiement/{order}', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/paiement/{order}/succes', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/paiement/{order}/annule', [PaymentController::class, 'cancel'])->name('payment.cancel');
});

/*
|--------------------------------------------------------------------------
| Espace administrateur (rôle admin uniquement)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('produits', AdminProductController::class)
        ->parameters(['produits' => 'product'])
        ->names('products');

    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::patch('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/commandes', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/commandes/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/commandes/{order}/statut', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';