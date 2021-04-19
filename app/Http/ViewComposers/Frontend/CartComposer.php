<?php

namespace App\Http\ViewComposers\Frontend;

use App\Services\Frontend\Cart\CartProductCalculator;
use Illuminate\Contracts\View\View;


class CartComposer
{

    protected $cartCalculator;

    public function __construct(CartProductCalculator $cartCalculator)
    {
        // Dependencies automatically resolved by service container...
        $this->cartCalculator = $cartCalculator;
    }


    public function compose(View $view)
    {
        $view->with('cart_total_price', $this->cartCalculator->getTotalPrice(request()->session()->getId()));
    }
}
