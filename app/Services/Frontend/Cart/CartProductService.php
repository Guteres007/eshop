<?php

namespace App\Services\Frontend\Cart;

use Illuminate\Support\Facades\DB;
use App\DataObjects\PriceDataObject;
use App\Models\ProductImage;

class CartProductService
{

    public function getProducts($user_session_id)
    {
        $cart_products = DB::table('cart_product')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('carts', 'cart_product.cart_id', '=', 'carts.id')
            ->leftJoin('product_images', 'cart_product.product_id', '=', 'product_images.id')
            ->where('carts.session_id', $user_session_id)
            ->where('carts.active', true)
            ->orderBy('id', 'desc')
            ->select(
                'products.id',
                'products.price',
                'products.name',
                'products.action',
                'products.action_price',
                'cart_product.quantity',
                'cart_product.product_id',
                'products.slug',
                'product_images'
            )
            ->get();

        return collect($cart_products)->map(function ($product) {

            if ($product->action) {
                $product->price = (new PriceDataObject($product->action_price));
                $product->product_images = ProductImage::where('product_id', $product->product_id)->where('rank', 1)->first();
                return $product;
            }
            $product->price = (new PriceDataObject($product->price));
            $product->product_images = ProductImage::where('product_id', $product->product_id)->where('rank', 1)->first();
            return $product;
        });
    }
}
