<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $payments = Payment::all();
        return view('admin.delivery-payment.index', compact('deliveries', 'payments'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //TODO: DeliveryPaymentService
        collect($request->input('delivery_payment'))->each(function ($delivery, $delivery_id) {

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

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
