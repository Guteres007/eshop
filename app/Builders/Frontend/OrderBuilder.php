<?php

namespace App\Builders\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Mail\OrderEmail;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Services\Frontend\OrderService;

class OrderBuilder
{
    private $orderService;
    private $cart;
    private $order;
    private $params;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
        $this->cart = Cart::where('session_id', session()->getId())->where('active', true)->first();
    }

    public function setOrder($params)
    {
        $this->params = $params;
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
                'products.action',
                'products.action_price',
                'products.shopping_price',
                'products.price_margin',
                'products.tax',
                'cart_product.quantity',
                'products.ean',
                'products.id'
            )
            ->get();
        foreach ($products as $product) {
            $price = $product->price;
            if ($product->action) {
                $price = $product->action_price;
            }
            $order_item = new OrderItem([
                'product_id' => $product->id,
                'internal_id' => $product->name,
                'name' => $product->name,
                'description' => $product->description,
                'short_description' => $product->short_description,
                'long_description' => $product->long_description,
                'price_without_vat' => $price / config('price.tax_rate'),
                'price' => $price,
                'price_margin' =>  $price -  $product->shopping_price,
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

    public function getOrder()
    {
        return $this->order;
    }

    public function sendEmail() {
        $order_data = $this->orderService->getOrder($this->order->hash);
        Mail::to($this->params->input('email'))->send(new OrderEmail($order_data));
        return $this;
    }
}
