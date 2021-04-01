<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Builders\Frontend\CartBuilder;


class CartController extends Controller
{
    public function store(Request $request, CartBuilder $cartBuilder)
    {
        $cartBuilder->createCart()
            ->createProduct($request->input('product_id'));
        return redirect()->route('frontend.cart.index');
    }

    public function index(Request $request)
    {
        $cart = Cart::where('session_id', $request->session()->getId())->first();
        $total_products_price = $cart->products()->sum('price');
        //dd($total_summary);

        $cart_products = DB::table('cart_product')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('carts', 'cart_product.cart_id', '=', 'carts.id')
            ->where('carts.session_id', $request->session()->getId())
            ->select('products.price', 'products.name', DB::raw('count(products.*) as total_products'), DB::raw('SUM(CAST(products.price as decimal)) as total_product_price'))
            ->groupBy('products.price')->groupBy('products.name')
            ->get();

        //dd($products->sum('price'));
        return view('frontend.cart.index', ['cart_products' => $cart_products, 'total_products_price' => $total_products_price]);
    }
}
