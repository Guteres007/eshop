<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function destroy($product_id)
    {
        dd(CartProduct::where('product_id', $product_id)->delete());
    }
}
