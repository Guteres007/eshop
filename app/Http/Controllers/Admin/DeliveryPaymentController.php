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
        //Smazat a pak přidat nové záznamy?
        collect($request->input('delivery_payment'))->each(function ($delivery, $delivery_id) {
            Delivery::find($delivery_id)->payments()->attach($delivery);
        });


        //DeliveryPaymentService
        //dd($request->input('delivery'));
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
