<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductHomepageController extends Controller
{
    public function store($product_id)
    {
        $product = Product::find($product_id);
        $product->homepage = !$product->homepage;
        return $product->save();
    }
}
