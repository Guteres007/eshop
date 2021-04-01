<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;
use App\Services\Frontend\Cart\CartProductCalculator;
use App\Services\Frontend\Cart\CartProductService;

class CartController extends Controller
{
    public function store(Request $request, CartBuilder $cartBuilder)
    {
        $cartBuilder->createCart()
            ->createProduct($request->input('product_id'));
        return redirect()->route('frontend.cart.index');
    }

    public function index(Request $request, CartProductService $cartProductService, CartProductCalculator $cartProductCalculator)
    {
        $cart_products = $cartProductService->getProducts($request->session()->getId());
        $total_products_price = $cartProductCalculator->getTotalPrice($request->session()->getId());

        return view('frontend.cart.index', [
            'cart_products' => $cart_products,
            'total_products_price' => $total_products_price
        ]);
    }
}
