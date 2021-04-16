<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;
use App\Models\CartProduct;

class CartProductController extends Controller
{
    public function destroy($product_id)
    {
        CartProduct::where('product_id', $product_id)->delete();
        return redirect()->back();
    }

    public function store(Request $request, CartBuilder $cartBuilder)
    {
        $cartBuilder
            ->getCurrentCart()
            ->addProduct($request->input('product_id'), $request->input('quantity'));

        return true;
    }
}
