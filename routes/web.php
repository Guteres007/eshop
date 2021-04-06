<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CartProductController;
use App\Http\Controllers\Frontend\CartController;


Route::get('/', [HomepageController::class, 'index'])->name('frontend.home');
Route::get('/category/{category:slug}', [FrontendCategoryController::class, 'show'])->name('frontend.category.show');
Route::get('/product/{product:slug}', [FrontendProductController::class, 'show'])->name('frontend.product.show');

Route::name('frontend.')->group(function () {
    Route::resource('cart', CartController::class)->except(['create', 'show']);
    Route::get('/cart/{cart:hash}', [CartController::class, 'show'])->name('cart.show');
    Route::delete('/cart-product/{id}', [CartProductController::class, 'destroy'])->name('cartproduct.destroy');
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::resource('category', CategoryController::class)->except(['show']);
        Route::resource('product', ProductController::class)->except(['show']);
    });
});
