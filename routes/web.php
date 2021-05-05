<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\ProductSignalController;
use App\Http\Controllers\Frontend\CartProductController;
use App\Http\Controllers\Admin\ProductParameterController;
use App\Http\Controllers\Admin\ProductTemporaryController;
use App\Http\Controllers\Admin\ProductImageUploadController;
use App\Http\Controllers\Frontend\DeliveryPaymentController;
use App\Http\Controllers\Frontend\TermsConditionsController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Admin\DeliveryPaymentController as AdminDeliveryPaymentController;

Route::name('frontend.')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/category/{category:slug}', [FrontendCategoryController::class, 'show'])->name('category.show');
    Route::get('/product/{product:slug}', [FrontendProductController::class, 'show'])->name('product.show');
    Route::resource('cart', CartController::class)->except(['create', 'show']);
    Route::get('/cart/{cart:hash}', [CartController::class, 'show'])->name('cart.show');
    Route::delete('/cart-product/{id}', [CartProductController::class, 'destroy'])->name('cartproduct.destroy');
    Route::post('/cart-product', [CartProductController::class, 'store'])->name('cartproduct.store');
    Route::get('/delivery-payment', [DeliveryPaymentController::class, 'index'])->name('delivery-payment.index')->middleware('IsCartProduct');
    Route::post('/delivery-payment', [DeliveryPaymentController::class, 'store'])->name('delivery-payment.store');
    Route::get('/delivery-payment/{id}', [DeliveryPaymentController::class, 'show'])->name('delivery-payment.show')->middleware('IsCartProduct');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{hash}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('IsCartProduct');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/terms-and-conditions', [TermsConditionsController::class, 'index'])->name('terms-conditions');
});

//auth pro zákazníky
Route::get('/register', [RegisteredUserController::class, 'store'])->name('register.store');


//admin login

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::view('/login', 'admin.login.index')->middleware('guest:admin')->name('login');
        $limiter = config('fortify.limiters.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:admin',
                $limiter ? 'throttle:' . $limiter : null,
            ]));
    });
});

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::name('admin.')->group(function () {

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('category', CategoryController::class)->except(['show']);
        Route::resource('delivery', DeliveryController::class)->except(['show']);
        Route::resource('payment', PaymentController::class)->except(['show']);
        Route::resource('product', ProductController::class)->except(['show', 'create']);
        Route::get('/product/{id}', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/{id}/image-upload', [ProductImageUploadController::class, 'store'])->name('product-image-upload.store');
        Route::post('/product/{id}/image-remove', [ProductImageUploadController::class, 'destroy'])->name('product-image-upload.destroy');

        Route::get('delivery-payment', [AdminDeliveryPaymentController::class, 'index'])->name('delivery-payment.index');
        Route::post('delivery-payment', [AdminDeliveryPaymentController::class, 'store'])->name('delivery-payment.store');
        Route::get('product/{id}/signal/{signal}', [ProductSignalController::class, 'store'])->name('product-signal.store');
        Route::get('/product-parameters-name', [ProductParameterController::class, 'name']);
        Route::get('/product-parameters-value', [ProductParameterController::class, 'value']);
        Route::post('/product-temporary', [ProductTemporaryController::class, 'store'])->name('product-temporary.store');
    });
});
