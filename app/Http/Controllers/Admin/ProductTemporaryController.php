<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTemporaryController extends Controller
{
    public function store(Request $request)
    {

        $product = new Product();
        $product->name = $request->input('name');
        $product->save();

        return redirect()->route('admin.product.create', ['id' => $product->id]);
    }
}
