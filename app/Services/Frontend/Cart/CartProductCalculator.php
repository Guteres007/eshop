<?php

namespace App\Services\Frontend\Cart;

use App\Models\Cart;


class CartProductCalculator
{
    public function getTotalPrice($user_session_id)
    {
        $cart = Cart::where('session_id', $user_session_id)->first();
        return $cart->products()->sum('price');
    }
}
