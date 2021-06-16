<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('order_items')->orderBy('id', 'desc')->paginate();

        return view('admin.order.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::with('order_items')->where('id', $id)->first();
        return view('admin.order.show', ['order' => $order]);
    }

    public function destroy($id) {
        Order::destroy($id);
        return redirect()->route('admin.order.index');
    }

}
