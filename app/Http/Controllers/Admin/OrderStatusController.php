<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{

   // bude potřeba statusy asi ukládat do databáze OrderStatus nebo tak něco;
   // V modelu si nadefinuji konstanty na typy. const NEVYRIZENA = 1 atd

    public function store($order_id, $status_id) {
      dd(Order::find($order_id)->order_status->update(['status_id' => $status_id]));
      return true;
    }
}
