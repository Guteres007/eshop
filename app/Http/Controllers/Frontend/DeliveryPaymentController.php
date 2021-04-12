<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Payment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeliveryPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.delivery-payment.index', ['deliveries' => Delivery::get(), 'payments' => Payment::get()]);
    }


    public function store(Request $request)
    {

        //session?
        dd($request);
    }

    public function show($delivery_id)
    {
        $payments = DB::table('delivery_payment')
            ->select('delivery_payment.delivery_id', 'delivery_payment.payment_id', 'delivery_payment.price', 'payments.name', 'payments.description')
            ->leftJoin('deliveries', 'delivery_payment.delivery_id', '=', 'deliveries.id')
            ->leftJoin('payments', 'delivery_payment.payment_id', '=', 'payments.id')
            ->where('delivery_payment.active', true)
            ->where('delivery_id', $delivery_id)
            ->get();
        return $payments;
    }
}
