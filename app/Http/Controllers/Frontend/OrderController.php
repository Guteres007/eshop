<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\OrderBuilder;

class OrderController extends Controller
{
    public function store(Request $request, OrderBuilder $orderBuilder)
    {

        DB::transaction(function () use ($orderBuilder, $request) {
            $orderBuilder->setOrder($request)
                ->setOrderItem()
                ->setStockQuantity();
        });

        return redirect('/');
    }
}
