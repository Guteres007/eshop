<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Admin\ProductBuilder;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Services\Admin\Product\UpdateProductService;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allPaginate();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(ProductRequest $request, ProductBuilder $productBuilder)
    {

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                //scenář: vytvořím složku ve store podle id produktu a nahraju
                //dd(uniqid() . $image->getClientOriginalExtension());
                //dd($image->getClientOriginalName());
            }
        }

        $productBuilder
            ->createProduct($request->all())
            ->createImages($request->file('images'));
        return redirect()->route('admin.product.index')->withSuccess("Produkt přidán");
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('admin.product.index')->withSuccess('Produkt smazán');
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->all();

        //helper nebo tak něco udělat, budu asi používat častěji
        $selected_category = $this->selectedCategory($product);

        return view("admin.product.edit", [
            'product' => $product,
            'categories' =>  $categories,
            'selected_category' => $selected_category
        ]);
    }

    public function update($id, ProductRequest $request, UpdateProductService $updateProductService)
    {
        $updateProductService->make($id, $request->all());
        return redirect()->route('admin.product.index')->withSuccess("Produkt editován");
    }
    //------------ private ------------
    private function selectedCategory($product)
    {
        $selected_category = [];
        foreach ($product->category as $category) {
            $selected_category[$category->id] = $category->id;
        }
        return $selected_category;
    }
}
