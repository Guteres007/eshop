<?php

namespace App\Builders\Frontend;

use App\Models\Cart;
use App\Models\CartProduct;
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

    public function getCurrentCart()
    {
        $this->cart = Cart::where('session_id', session()->getId())->where('active', true)->first();
        if (!$this->cart) {
            $this->cart = $this->cartFactory->make();
        }
        return $this;
    }

    public function addProduct($product_id, $quantity = 1)
    {
        $cart_product = $this->cart->products()->where(['product_id' => $product_id]);
        if (!$cart_product->first()) {
            $this->cartProductFactory->create($this->cart, $product_id, $quantity);
        } else {
            $cart_product->first()->pivot->update(['quantity' => $quantity]);
        }

        return $this;
    }
}
