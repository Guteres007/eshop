<?php

namespace App\Services\Frontend\Cart;

use Illuminate\Support\Facades\DB;

class CartProductService
{

    public function getProducts($user_session_id)
    {

        $cart_products = DB::table('cart_product')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('carts', 'cart_product.cart_id', '=', 'carts.id')
            ->leftJoin('product_images', 'cart_product.product_id', '=', 'product_images.id')
            ->where('carts.session_id', $user_session_id)
            ->orderBy('id', 'desc')
            ->select(
                'products.id',
                'products.price',
                'products.name',
                'product_images.path as product_image_path',
                'cart_product.quantity',
                'products.slug',
            )
            ->get();

        return $cart_products;
    }
}
