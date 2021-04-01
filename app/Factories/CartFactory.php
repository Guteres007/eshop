<?php

namespace App\Factories;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartFactory
{
    public function make()
    {
        return Cart::create([
            'user_id' => Auth::id(),
            'session_id' => session()->getId(),
            'hash' => Str::random(25)
        ]);
    }
    //add items?
}
