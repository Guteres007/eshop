<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ProductParameterController extends Controller
{
    public function name()
    {
        return Parameter::all()->pluck('name')->unique()->values();
    }

    public function value()
    {
        return Parameter::all()->pluck('value')->unique()->values();
    }
}
