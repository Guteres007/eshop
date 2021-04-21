<?php

namespace App\Builders\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Services\Frontend\OrderService;

class OrderBuilder
{
    private $orderService;
    private $cart;
    private $order;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->cart = Cart::where('session_id', session()->getId())->where('active', true)->first();
    }

    public function setOrder($params)
    {
        $this->order = $this->orderService->makeOrder($this->cart, $params);
        return $this;
    }

    public function setOrderItem()
    {
        $products = DB::table('cart_product')
            ->leftJoin('products', 'products.id', "=", 'cart_product.product_id')
            ->where('cart_product.cart_id', $this->cart->id)
            ->select(
                'products.internal_id',
                'products.name',
                'products.short_description',
                'products.long_description',
                'products.description',
                'products.price_without_vat',
                'products.price',
                'products.shopping_price',
                'products.price_margin',
                'products.tax',
                'cart_product.quantity',
                'products.ean'
            )
            ->get();
        foreach ($products as $product) {
            $order_item = new OrderItem([
                'internal_id' => $product->name,
                'name' => $product->name,
                'description' => $product->description,
                'short_description' => $product->short_description,
                'long_description' => $product->long_description,
                'price_without_vat' => $product->price_without_vat,
                'price' => $product->price,
                'price_margin' => $product->price_margin,
                'shopping_price' => $product->shopping_price,
                'tax' => $product->tax,
                'quantity' => $product->quantity,
                'ean' => $product->ean,
            ]);

            $this->order->order_items()->save($order_item);
        }

        return $this;
    }

    public function setStockQuantity()
    {
        $this->cart->cart_products->each(function ($cart_product) {
            $product_original = Product::find($cart_product->product_id);
            $product_original->quantity = $product_original->quantity - $cart_product->quantity;
            $product_original->save();
        });
        return $this;
    }
}
