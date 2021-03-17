<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->allPaginate();
        return view('admin.product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('admin.product.create');
    }
    public function store()
    {
        return 'ok';
    }
}
