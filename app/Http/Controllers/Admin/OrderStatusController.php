<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{

   // bude potřeba statusy asi ukládat do databáze OrderStatus nebo tak něco;
   // V modelu si nadefinuji konstanty na typy. const NEVYRIZENA = 1 atd

    public function store($id, $status_id) {
        //Změna statusu
      return true;
    }
}
