<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;


class CartController extends Controller
{
    public function store(Request $request, CartBuilder $cartBuilder)
    {
        return dd($cartBuilder->createCart());
    }
}
