<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //OrderService

        $cart = Cart::where('session_id', session()->getId());
        $cart->update(['active' => false]);
        $cart->first()->order()->create($request->all());
        $cart->first()->cart_products->each(function ($product) {
            $product_original = Product::find($product->product_id);
            $product_original->quantity = $product_original->quantity - $product->quantity;
            $product_original->save();
        });

        session()->regenerate();
        // iterovat a najít produkty
        //delivery_id
        //payment_id
        //CartProduct => ponížit sladovost

        dd('dekujeme');
    }
}
