<?php

namespace App\Services\Frontend;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'payment_price' => $payment->price
        ]);

        if ($order->id) {
            $cart->update(['active' => false]);
            return $order;
        }

        return false;
    }
}
