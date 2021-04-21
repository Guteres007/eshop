<?php

namespace App\Services\Frontend;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\DeliveryPayment;
use Illuminate\Support\Facades\DB;

class OrderService
{

    public function makeOrder(Request $attributes)
    {
        $cart = Cart::where('session_id', session()->getId())->where('active', true);
        $cart->first()->cart_products->each(function ($cart_product) {
            $product_original = Product::find($cart_product->product_id);
            $product_original->quantity = $product_original->quantity - $cart_product->quantity;
            $product_original->save();
        });

        $delivery =  Delivery::find(session('delivery_id'));
        $payment = DB::table('delivery_payment')->join('payments', 'payments.id', '=', 'delivery_payment.payment_id')
            ->where('delivery_payment.payment_id', session('payment_id'))
            ->where('delivery_payment.delivery_id', session('delivery_id'))
            ->first();

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
        if ($order->id) {
            $cart->update(['active' => false]);
            return true;
        }

        return false;
    }
}
