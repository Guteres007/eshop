<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Cart\CartProductService;
use App\Services\Frontend\Cart\CartProductCalculator;
use App\Services\Frontend\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function index(Request $request, CheckoutService $checkoutService, CartProductService $cartProductService, CartProductCalculator $cartProductCalculator)
    {
        if (session('delivery_id') && session('payment_id')) {
            $delivery_payment_data = $checkoutService->getDeliveryPaymentData();
            $cart_products = $cartProductService->getProducts($request->session()->getId());
            $total_products_price = $cartProductCalculator->getTotalPrice($request->session()->getId());
            return view('frontend.checkout.index', compact('delivery_payment_data', 'cart_products', 'total_products_price'));
        }
        return redirect()->route('frontend.delivery-payment.index');
    }
}
