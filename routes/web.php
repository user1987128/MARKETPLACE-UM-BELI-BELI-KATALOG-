<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIC (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// Homepage marketplace
Route::get('/', [MarketplaceController::class, 'index'])->name('marketplace');

// Semua produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Detail produk
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');

// Tentang (menu header)
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// User Guide
Route::get('/user-guide', [GuideController::class, 'userGuide'])->name('user.guide');

/*
|--------------------------------------------------------------------------
| AUTH (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| ROUTE YANG MEMBUTUHKAN LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | CART — USER
    |--------------------------------------------------------------------------
    */
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    /*
    |--------------------------------------------------------------------------
    | ORDERS — USER
    |--------------------------------------------------------------------------
    */
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin'])->group(function () {

        // Produk CRUD
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Admin Guide
        Route::get('/admin-guide', [GuideController::class, 'adminGuide'])->name('admin.guide');

        // Admin Orders
        Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    });
});
