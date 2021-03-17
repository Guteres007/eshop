<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Product\ProductRepository;
use App\Services\Admin\Product\CreateProductService;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allPaginate();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request, CreateProductService $createProductService)
    {
        if ($createProductService->make($request->all())) {
            return redirect()->route('admin.product.index')->withSuccess("Produkt přidán");
        }
        return redirect()->route('admin.product.index')->withError("Produkt přidán");
    }
}
