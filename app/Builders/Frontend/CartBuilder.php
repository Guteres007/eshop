<?php

namespace App\Builders\Frontend;

use App\Models\Cart;
use App\Factories\CartFactory;
use App\Factories\CartProductFactory;

class CartBuilder
{
    private $cartFactory;
    private $cartProductFactory;
    private $cart;
    public function __construct(CartFactory $cartFactory, CartProductFactory $cartProductFactory)
    {
        $this->cartProductFactory = $cartProductFactory;
        $this->cartFactory = $cartFactory;
    }

    public function createCart()
    {
        $this->cart = Cart::where('session_id', session()->getId())->where('active', true)->first();
        if (!$this->cart) {
            $this->cart = $this->cartFactory->make();
        }
        return $this;
    }

    public function createProduct($product_id)
    {
        $this->cartProductFactory->make($this->cart, $product_id);
        return $this;
    }
}
