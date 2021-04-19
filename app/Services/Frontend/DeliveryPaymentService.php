<?php

namespace App\Services\Frontend;

use App\Helpers\PriceHelper;
use Illuminate\Support\Facades\DB;

class DeliveryPaymentService
{
    public function getPaymentsByDeliveryId($delivery_id)
    {
        $payments_from_db = DB::table('delivery_payment')
            ->select('delivery_payment.delivery_id', 'delivery_payment.payment_id', 'delivery_payment.price', 'payments.name', 'payments.description')
            ->leftJoin('deliveries', 'delivery_payment.delivery_id', '=', 'deliveries.id')
            ->leftJoin('payments', 'delivery_payment.payment_id', '=', 'payments.id')
            ->where('delivery_payment.active', true)
            ->where('delivery_id', $delivery_id)
            ->get();

        $payments = collect($payments_from_db)->map(function ($payment) {
            $payment->price = PriceHelper::format_price_with_currency($payment->price);
            return  $payment;
        });

        return $payments;
    }
}
