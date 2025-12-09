<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\GuideController;


// =========================================
// HALAMAN PUBLIC
// =========================================

// Homepage marketplace
Route::get('/', [MarketplaceController::class, 'index'])->name('marketplace');

// Semua produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Detail produk (HANYA 1 ROUTE INI!)
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');

// User Guide
Route::get('/user-guide', [GuideController::class, 'userGuide'])->name('user.guide');


// =========================================
// ROUTE YANG MEMBUTUHKAN LOGIN
// =========================================
Route::middleware(['auth'])->group(function () {

    // =====================================
    // ADMIN ONLY — CRUD PRODUK
    // =====================================
    Route::middleware(['admin'])->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Admin Guide
        Route::get('/admin-guide', [GuideController::class, 'adminGuide'])->name('admin.guide');
    });

    // =====================================
    // CART — USER LOGIN
    // =====================================
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // PENTING: TYPED ROUTE MODEL BINDING
    // {product} AKAN MENGIRIM id PRODUK SECARA OTOMATIS
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');

    // =====================================
    // CHECKOUT — USER LOGIN
    // =====================================
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // =====================================
    // ORDERS — USER LOGIN
    // =====================================
    Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// =========================================
// ROUTE AUTH TANPA LOGIN
// =========================================

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
