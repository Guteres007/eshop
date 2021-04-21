<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(ProductRepository $productRepository)
    {
        return view('frontend.homepage', ['homepage_products' => $productRepository->homepageProducts()]);
    }
}
