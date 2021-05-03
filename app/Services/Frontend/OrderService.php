<?php

namespace App\Services\Frontend;

use App\Models\Delivery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataObjects\PriceDataObject;

class OrderService
{

    public function makeOrder($cart, Request $attributes)
    {
        //Vlastní service DaliveryPaymentService (už je vytvořená)
        //delivery a payment data
        $delivery =  Delivery::find(session('delivery_id'));
        $payment = DB::table('delivery_payment')->join('payments', 'payments.id', '=', 'delivery_payment.payment_id')
            ->where('delivery_payment.payment_id', session('payment_id'))
            ->where('delivery_payment.delivery_id', session('delivery_id'))
            ->first();

        //Předělat do Factory a asi ani sevice nebude potřeba
        $order = $cart->order()->create([
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
            'payment_price' => $payment->price,
            'hash' => Str::random(32),
        ]);

        if ($order->id) {
            $cart->update(['active' => false]);
            return $order;
        }

        return false;
    }

    public function getOrder($hash)
    {

        $order_items = DB::table('orders')->where('hash', $hash)
            ->join('order_item', 'orders.id', '=', 'order_item.order_id')
            ->leftJoin('products', 'order_item.product_id', '=', 'products.id')
            ->leftJoin('product_images', 'order_item.product_id', 'product_images.product_id')
            ->where('product_images.rank', 1)
            ->select('order_item.*', 'orders.*', 'product_images.path as image_path', 'products.slug as product_slug')->get();

        $order_data = $order_items[0];

        $delivery_payment_raw = $order_data->delivery_price + $order_data->payment_price;
        $delivery_payment_price = (new PriceDataObject($delivery_payment_raw))->price_with_currency();
        $order_total_price_raw = collect($order_items)->map(function ($order_item) {
            return $order_item->price * $order_item->quantity;
        })->sum();


        $total_price_with_delivery_payment = $order_total_price_raw + $delivery_payment_raw;
        $order_total_price = (new PriceDataObject($total_price_with_delivery_payment))->price_with_currency();

        return  [
            $order_data,
            $order_items,
            $delivery_payment_price,
            $order_total_price
        ];
    }
}
