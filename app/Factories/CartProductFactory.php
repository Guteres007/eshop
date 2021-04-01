<?php

namespace App\Factories;

use App\Models\Cart;


class CartProductFactory
{
    public function make(Cart $cart, $product_id)
    {
        return $cart->products()->attach($product_id);
    }
}
