<?php

namespace App\Http\ViewComposers\Frontend;

use App\Services\Frontend\Cart\CartProductService;
use Illuminate\Contracts\View\View;


class CartProductComposer
{

    protected $cartProductService;

    public function __construct(CartProductService $cartProductService)
    {
        // Dependencies automatically resolved by service container...
        $this->cartProductService = $cartProductService;
    }


    public function compose(View $view)
    {
        $view->with('cart_products', $this->cartProductService->getProducts(request()->session()->getId()));
    }
}
