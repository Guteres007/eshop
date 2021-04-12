<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\DeliveryPaymentService;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request, DeliveryPaymentService $deliveryPaymentService)
    {
        $deliveryPaymentService->save($request->input('delivery_payment'));
        return redirect()->back();
    }
}
