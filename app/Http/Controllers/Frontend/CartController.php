<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;


class CartController extends Controller
{
    public function store(Request $request, CartBuilder $cartBuilder)
    {
        $product = $cartBuilder->createCart()
            ->createProduct($request->input('product_id'));
        return redirect()->route('frontend.cart.show', $product->hash);
    }

    public function show($hash)
    {
        dd($hash);
    }
}
