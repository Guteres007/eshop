<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Payment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Cart\CartProductService;
use App\Services\Frontend\DeliveryPaymentService;

class DeliveryPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.delivery-payment.index', ['deliveries' => Delivery::get(), 'payments' => Payment::get()]);
    }


    public function store(Request $request)
    {
        $payment_id = $request->input('payment_id');
        $delivery_id = $request->input('delivery_id');

        if ($payment_id && $delivery_id) {
            session([
                'delivery_id' => $delivery_id,
                'payment_id' => $payment_id
            ]);
            return redirect()->route('frontend.checkout.index');
        }

        return redirect()->back()->with('error', 'Doprava a platba jsou povinné');
    }

    public function show($delivery_id, DeliveryPaymentService $deliveryPaymentService)
    {
        return $deliveryPaymentService->getPaymentsByDeliveryId($delivery_id);
    }
}
