<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductLabelController extends Controller
{
    public function store($product_id, $label)
    {

        //Service Předělat na ProductSignals
        $product = Product::find($product_id);
        switch ($label) {
            case 'new':
                $product->new = !$product->new;
                break;
            case 'action':
                $product->action = !$product->action;
                break;
            case 'sale':
                $product->sale = !$product->sale;
                break;
            default:
                # code...
                break;
        }

        return $product->save();
    }
}
