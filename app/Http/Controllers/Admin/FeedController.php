<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\FeedJob;


class FeedController extends Controller
{
    public function generate($type)
    {
        $this->dispatch(new FeedJob($type));
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.feeds.index');
    }
}
