<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;
use App\Services\StockQuantityService;

class CartProductController extends Controller
{
    public function destroy($product_id)
    {
        CartProduct::where('product_id', $product_id)->delete();
        return redirect()->back();
    }

    public function store(Request $request, CartBuilder $cartBuilder, StockQuantityService $stockQuantityService)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if ($stockQuantityService->productHasQuantity($product_id, $quantity)) {
            $cartBuilder
                ->getCurrentCart()
                ->addProduct($product_id, $quantity);

            return true;
        }

        $request->session()->flash('error', 'Požadovaný počet kusů není na skladě.');
        return false;
    }
}
