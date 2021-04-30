<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\OrderBuilder;
use App\Http\Requests\Frontend\OrderRequest;

class OrderController extends Controller
{
    public function store(OrderRequest $request, OrderBuilder $orderBuilder)
    {

        DB::transaction(function () use ($orderBuilder, $request) {
            $orderBuilder->setOrder($request)
                ->setOrderItem()
                ->setStockQuantity();
        });

        return redirect()->route('frontend.order.show',  $orderBuilder->getOrder()->id);
    }

    public function show($id)
    {
        dd($id . " " .  "prevent multiple submit");
    }
}
