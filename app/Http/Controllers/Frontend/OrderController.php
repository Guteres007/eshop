<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Frontend\OrderService;

class OrderController extends Controller
{
    public function store(Request $request, OrderService $orderService)
    {
        try {
            $orderService->makeOrder($request);
        } catch (\Throwable $th) {
            Log::alert($th);
        }
        return redirect()->back();
    }
}
