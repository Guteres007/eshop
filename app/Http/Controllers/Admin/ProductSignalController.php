<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSignalController extends Controller
{
    public function store($product_id, $signal_name)
    {

        //Service Předělat na ProductSignals
        $product = Product::find($product_id);
        switch ($signal_name) {
            case 'new':
                $product->new = !$product->new;
                break;
            case 'action':
                $product->action = !$product->action;
                break;
            case 'sale':
                $product->sale = !$product->sale;
                break;
            case 'active':
                $product->active = !$product->active;
                break;
            case 'homepage':
                $product->homepage = !$product->homepage;
                break;
            default:
                return false;
                break;
        }

        return $product->save();
    }
}
