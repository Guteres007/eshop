<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\DataObjects\PriceDataObject;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\OrderBuilder;
use App\Http\Requests\Frontend\OrderRequest;
use App\Services\Frontend\OrderService;

class OrderController extends Controller
{
    public function store(OrderRequest $request, OrderBuilder $orderBuilder)
    {

        DB::transaction(function () use ($orderBuilder, $request) {
            $orderBuilder->setOrder($request)
                ->setOrderItem()
                ->setStockQuantity();
        });

        return redirect()->route('frontend.order.show',  $orderBuilder->getOrder()->hash);
    }

    public function show($hash, OrderService $orderService)
    {

        try {
            list(
                $order_data,
                $order_items,
                $delivery_payment_price,
                $order_total_price
            ) = $orderService->getOrder($hash);

            return view('frontend.order.success', [
                'order' => $order_data,
                'order_items' => $order_items,
                'delivery_payment_price' => $delivery_payment_price,
                'order_total_price' => $order_total_price
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('frontend.home');
        }
    }
}
