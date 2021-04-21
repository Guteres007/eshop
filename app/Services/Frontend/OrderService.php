<?php

namespace App\Services\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderService
{

    public function makeOrder(Request $attributes)
    {

        DB::transaction(function () use ($attributes) {
            //delivery a payment data
            $delivery =  Delivery::find(session('delivery_id'));
            $payment = DB::table('delivery_payment')->join('payments', 'payments.id', '=', 'delivery_payment.payment_id')
                ->where('delivery_payment.payment_id', session('payment_id'))
                ->where('delivery_payment.delivery_id', session('delivery_id'))
                ->first();

            //cart
            $cart = Cart::where('session_id', session()->getId())->where('active', true);

            //ponížení skladu, to tady asi nemá být. udělat builder
            $cart->first()->cart_products->each(function ($cart_product) {
                $product_original = Product::find($cart_product->product_id);
                $product_original->quantity = $product_original->quantity - $cart_product->quantity;
                $product_original->save();
            });

            //order
            $order = $cart->first()->order()->create([
                'first_name' => $attributes->input('first_name'),
                'last_name' => $attributes->input('last_name'),
                'street' => $attributes->input('street'),
                'city' => $attributes->input('city'),
                'postcode' => $attributes->input('postcode'),
                'email' => $attributes->input('email'),
                'phone' => $attributes->input('phone'),
                'comment' => $attributes->input('comment'),
                'delivery_id' => session('delivery_id'),
                'payment_id' => session('payment_id'),
                'delivery_name' => $delivery->name,
                'delivery_price' => $delivery->price,
                'payment_name' => $payment->name,
                'payment_price' => $payment->price
            ]);

            //Order items
            $cart->first()->products->each(function ($cart_product)  use ($order) {
                $order_item = new OrderItem([
                    'internal_id' => $cart_product->name,
                    'name' => $cart_product->name,
                    'description' => $cart_product->description,
                    'short_description' => $cart_product->short_description,
                    'long_description' => $cart_product->long_description,
                    'price_without_vat' => $cart_product->price_without_vat->raw(),
                    'price' => $cart_product->price->raw(),
                    'price_margin' => $cart_product->price_margin->raw(),
                    'shopping_price' => $cart_product->shopping_price->raw(),
                    'tax' => $cart_product->tax,
                    'quantity' => $cart_product->quantity,
                    'ean' => $cart_product->ean,
                ]);
                $order->order_items()->save($order_item);
            });


            //špatná quantity dodělat v builder

            if ($order->id) {
                $cart->update(['active' => false]);
                return true;
            }

            return false;
        });
    }
}
