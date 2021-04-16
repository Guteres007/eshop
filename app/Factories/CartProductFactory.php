<?php

namespace App\Factories;

use App\Models\Cart;


class CartProductFactory
{
    public function create(Cart $cart, $product_id, $quantity)
    {
        return $cart->products()->attach($product_id, ['quantity' => $quantity]);
    }
}
