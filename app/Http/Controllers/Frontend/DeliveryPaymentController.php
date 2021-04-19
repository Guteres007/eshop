<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Payment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\DeliveryPaymentService;

class DeliveryPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.delivery-payment.index', ['deliveries' => Delivery::get(), 'payments' => Payment::get()]);
    }


    public function store(Request $request)
    {
        //dd(session()->get('delivery_id'), session()->get('payment_id'));

        session([
            'delivery_id' => $request->input('delivery_id'),
            'payment_id' => $request->input('payment_id')
        ]);

        return redirect()->route('frontend.checkout.index');
    }

    public function show($delivery_id, DeliveryPaymentService $deliveryPaymentService)
    {
        return $deliveryPaymentService->getPaymentsByDeliveryId($delivery_id);
    }
}
