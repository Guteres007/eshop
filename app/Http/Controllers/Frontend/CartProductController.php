<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;
use App\Services\Frontend\Cart\CartProductService;

class CartProductController extends Controller
{
    public function destroy($product_id)
    {
        CartProduct::where('product_id', $product_id)->delete();
        return redirect()->back();
    }

    public function store(Request $request, CartProductService $cartProductService, CartBuilder $cartBuilder)
    {

        //Celé jako service refaktorovat
        $product_cart_count = $cartProductService->getProductCountByProductId($request->session()->getId(), $request->input('product_id'));

        if ($product_cart_count > $request->input('quantity')) {
            return 'odčítat';
        } else {
            for ($i = $product_cart_count; $i < $request->input('quantity'); $i++) {
                $cartBuilder
                    ->createCart()
                    ->createProduct($request->input('product_id'));
            }
        }

        //zjisti jestli se bude sčítat produkt nebo odčítat



        return true;
    }
}
