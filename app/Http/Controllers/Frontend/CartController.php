<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Factories\CartFactory;

class CartController extends Controller
{
    public function store(Request $request, CartFactory $cartFactory)
    {
        return dd($cartFactory->make());
    }
}
