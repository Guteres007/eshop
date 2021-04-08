<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryPaymentController extends Controller
{
    public function index()
    {

        return view('frontend.delivery-payment.index', ['deliveries'  => Delivery::get()]);
    }
}
