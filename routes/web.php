<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owner\ProductController as OwnerProductController;
use App\Http\Controllers\Owner\OrderController as OwnerOrderController;
use App\Http\Controllers\Owner\NewsController as OwnerNewsController;
use App\Http\Controllers\Owner\TestimonialController as OwnerTestimonialController;
use App\Http\Controllers\Owner\AuthController as OwnerAuthController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Buyer\ProductController as BuyerProductController;
use App\Http\Controllers\Buyer\CartController as BuyerCartController;
use App\Http\Controllers\Buyer\OrderController as BuyerOrderController;
use App\Http\Controllers\Buyer\TestimonialController as BuyerTestimonialController;
use App\Http\Controllers\Buyer\AuthController as BuyerAuthController;

Route::get('/', [BuyerProductController::class, 'home'])->name('home');
Route::get('/products', [BuyerProductController::class, 'index'])->name('buyer.products');
Route::get('/products/{id}', [BuyerProductController::class, 'show'])->name('buyer.products.show');
Route::get('/contact', fn() => view('buyer.contact'))->name('contact');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [BuyerAuthController::class, 'showRegisterForm'])->name('buyer.register');
    Route::post('/register', [BuyerAuthController::class, 'register'])->name('buyer.register.submit');
    Route::get('/login', [BuyerAuthController::class, 'showLoginForm'])->name('buyer.login');
    Route::post('/login', [BuyerAuthController::class, 'login'])->name('buyer.login.submit');
});

Route::middleware(['auth', 'role:buyer'])->name('buyer.')->group(function () {
    Route::get('/cart', [BuyerCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [BuyerCartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [BuyerCartController::class, 'remove'])->name('cart.remove');
    Route::get('/orders', [BuyerOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/checkout', [BuyerOrderController::class, 'create'])->name('checkout.form');
    Route::post('/orders/checkout', [BuyerOrderController::class, 'process'])->name('checkout.process');
    Route::post('/testimonials/{product}', [BuyerTestimonialController::class, 'store'])->name('testimonials.store');
    Route::post('/logout', [BuyerAuthController::class, 'logout'])->name('logout');
});

Route::prefix('owner')->group(function () {
    Route::middleware(['auth', 'role:owner'])->prefix('dashboard')->name('owner.')->group(function () {
        Route::get('/', [OwnerDashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', OwnerProductController::class);
        Route::resource('news', OwnerNewsController::class);
        Route::get('/orders', [OwnerOrderController::class, 'index'])->name('orders.index');
        Route::put('/orders/{order}', [OwnerOrderController::class, 'update'])->name('orders.update');
        Route::get('/testimonials', [OwnerTestimonialController::class, 'index'])->name('testimonials.index');
        Route::post('/testimonials/{id}/reply', [OwnerTestimonialController::class, 'reply'])->name('testimonials.reply');
        Route::post('/logout', [OwnerAuthController::class, 'logout'])->name('logout');
    });

    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [OwnerAuthController::class, 'showLoginForm'])->name('owner.login');
        Route::post('/login', [OwnerAuthController::class, 'login'])->name('owner.login.submit');
    });
});
