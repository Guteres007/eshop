<?php

namespace App\Services\Frontend\Checkout;

use App\Helpers\PriceHelper;
use App\Models\Delivery;
use App\Models\DeliveryPayment;
use Illuminate\Http\Request;

class CheckoutService
{


    private $request;
    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }

    function getDeliveryPaymentData()
    {
        $delivery = Delivery::find($this->request->session()->get('delivery_id'));
        $payment = DeliveryPayment::join('payments', 'payments.id', '=', 'delivery_payment.payment_id')
            ->where('delivery_id', $this->request->session()->get('delivery_id'))
            ->where('payment_id', $this->request->session()->get('payment_id'))
            ->first();

        return [
            'delivery_name' => $delivery->name,
            'delivery_price' => $delivery->price,
            'payment_name' => $payment->name,
            'payment_price' => $payment->price,
        ];
    }
}
