<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //Service
        $orders_last_day = Order::with('order_items')->whereDate('created_at' , '>', Carbon::now()->subDays(1))->orderBy('id', 'desc')->paginate();
        $last_30_days = OrderItem::whereDate('created_at' , '>', Carbon::now()->subDays(30))->get();
        $orders_last_month_count = Order::whereDate('created_at' , '>', Carbon::now()->subDays(30))->count();
        $orders_last_day_count = Order::whereDate('created_at' , '>', Carbon::now()->subDays(1))->count();
        $orders = $orders_last_day;
        $earnings = collect( $last_30_days)->map(function($order){
            return $order->price->raw() * $order->quantity;
        })->sum();
        $profit = collect( $last_30_days)->map(function($order){
            return $order->price_margin * $order->quantity;
        })->sum();

        return view('admin.dashboard.index', compact('orders', 'earnings', 'profit', 'orders_last_day_count', 'orders_last_month_count'));
    }
}
