<?php

namespace App\Services\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderService
{

    public function makeOrder(Request $attributes)
    {
        $cart = Cart::where('session_id', session()->getId())->where('active', true);
        $cart->first()->cart_products->each(function ($cart_product) {
            $product_original = Product::find($cart_product->product_id);
            $product_original->quantity = $product_original->quantity - $cart_product->quantity;
            $product_original->save();
        });

        $newCart = $cart->first()->order()->create([
            'first_name' => $attributes->input('first_name'),
            'last_name' => $attributes->input('last_name'),
            'street' => $attributes->input('street'),
            'city' => $attributes->input('city'),
            'postcode' => $attributes->input('postcode'),
            'email' => $attributes->input('email'),
            'phone' => $attributes->input('phone'),
            'comment' => $attributes->input('comment'),
            'delivery_id' => session('delivery_id'),
            'payment_id' => session('payment_id')
        ]);

        if ($newCart->id) {
            $cart->update(['active' => false]);
            return true;
        }

        return false;
    }
}
