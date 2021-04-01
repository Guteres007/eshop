<?php

namespace App\Services\Frontend\Cart;

use Illuminate\Support\Facades\DB;

class CartProductService
{

    public function make($user_session_id)
    {

        $cart_products = DB::table('cart_product')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('carts', 'cart_product.cart_id', '=', 'carts.id')
            ->where('carts.session_id', $user_session_id)
            ->select('products.id', 'products.price', 'products.name', DB::raw('count(products.*) as total_products'), DB::raw('SUM(CAST(products.price as decimal)) as total_product_price'))
            ->groupBy('products.price')->groupBy('products.name')->groupBy('products.id')
            ->get();

        return $cart_products;
    }
}
