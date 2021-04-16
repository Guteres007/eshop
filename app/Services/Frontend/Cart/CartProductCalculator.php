<?php

namespace App\Services\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class CartProductCalculator
{
    public function getTotalPrice($user_session_id)
    {
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
            return $total_price;
        }
        return 0;
    }
}
