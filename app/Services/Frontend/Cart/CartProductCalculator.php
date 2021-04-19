<?php

namespace App\Services\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\DataObjects\PriceDataObject;


class CartProductCalculator
{
    public function getTotalPrice($user_session_id)
    {
        $total_price = 0;
        $cart = Cart::where('session_id', $user_session_id)->first();
        if ($cart) {

            $cart_products = DB::table('cart_product')
                ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
                ->leftJoin('carts', 'cart_product.cart_id', '=', 'carts.id')
                ->where('carts.session_id', $user_session_id)
                ->select(
                    'products.id',
                    'products.price',
                    'products.name',
                    'cart_product.quantity'
                )
                ->get();

            $total_price = $cart_products->sum(function ($product) {
                return $product->price * $product->quantity;
            });
        }
        return new PriceDataObject($total_price);
    }
}
