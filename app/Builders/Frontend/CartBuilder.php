<?php

namespace App\Builders\Frontend;

use App\Models\Cart;
use App\Factories\CartFactory;

class CartBuilder
{
    private $cartFactory;
    public function __construct(CartFactory $cartFactory)
    {
        $this->cartFactory = $cartFactory;
    }

    public function createCart()
    {
        if (!Cart::where('session_id', session()->getId())->where('active', true)->first()) {
            $this->cartFactory->make();
        }
        return $this;
    }
}
