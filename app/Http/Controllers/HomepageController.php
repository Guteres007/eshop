<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('key', 'value');
        dd($request->session()->get('key'));
    }
}
