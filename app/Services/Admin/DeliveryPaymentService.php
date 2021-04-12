<?php

namespace App\Services\Admin;

use App\Models\Delivery;
use Illuminate\Support\Facades\DB;

class DeliveryPaymentService
{

    public function save(array $attributes)
    {
        DB::table('delivery_payment')->truncate();

        collect($attributes)->each(function ($delivery, $delivery_id) {

            $sanitize_delivery_payment = collect($delivery)->map(function ($payment) {
                if (!isset($payment['active'])) {
                    $payment['active'] = false;
                }
                if (!isset($payment['price'])) {
                    $payment['price'] = 0;
                }
                return $payment;
            });

            Delivery::find($delivery_id)->payments()->attach($sanitize_delivery_payment);
        });
    }
}
