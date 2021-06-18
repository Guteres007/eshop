<?php

namespace App\Http\ViewComposers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Contracts\View\View;


class OrderCountComposer
{


    public function compose(View $view)
    {
        $view->with('order_count_last_day', Order::whereDate('created_at' , '>', Carbon::now()->subDays(1))->count());
    }
}
