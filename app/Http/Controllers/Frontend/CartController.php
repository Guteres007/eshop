<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\DataObjects\PriceDataObject;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;
use App\Services\Frontend\Cart\CartProductService;
use App\Services\Frontend\Cart\CartProductCalculator;
use App\Services\StockQuantityService;

class CartController extends Controller
{
    public function store(Request $request, CartBuilder $cartBuilder, StockQuantityService $stockQuantityService)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if ($stockQuantityService->productHasQuantity($product_id, $quantity)) {
            $cartBuilder->getCurrentCart()
                ->addProduct($product_id, $quantity);
            return redirect()->route('frontend.cart.index');
        }


        return redirect()->back()->with('error', 'Požadovaný počet kusů není na skladě.');
    }

    public function index(Request $request, CartProductService $cartProductService, CartProductCalculator $cartProductCalculator)
    {
        $cart_products = $cartProductService->getProducts($request->session()->getId());
        $total_products_price = $cartProductCalculator->getTotalPrice($request->session()->getId());
        return view('frontend.cart.index', [
            'cart_products' => $cart_products,
            'total_products_price' => $total_products_price,
            'delivery_price' => (new PriceDataObject(Delivery::min('price')))->formated()
        ]);
    }
}
