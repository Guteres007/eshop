<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\FeedJob;
use Flasher\Toastr\Prime\ToastrFactory;


class FeedController extends Controller
{
    public function generate($type, ToastrFactory  $flasher)
    {
        $this->dispatch(new FeedJob($type));
        $flasher->addSuccess('Feed se generuje');
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.feeds.index');
    }
}
