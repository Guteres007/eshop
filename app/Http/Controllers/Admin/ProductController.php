<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Builders\Admin\ProductBuilder;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Services\Admin\Product\DeleteProductService;
use App\Services\Admin\Product\UpdateProductService;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->query('search_by_id')) {
            $products = $this->productRepository->where(['id' => (int)$request->query('search_by_id')])->paginate(10);
        } else if ($request->query('search_by_name')) {
            $products =  $this->productRepository->whereLike('name', $request->query('search_by_name'))->paginate(10);
        } else {
            $products = $this->productRepository->allPaginate();
        }

        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(ProductCreateRequest $request, ProductBuilder $productBuilder)
    {
        $productBuilder
            ->createProduct($request->all())
            ->createImages($request->file('images'));

        return redirect()->route('admin.product.index')->withSuccess("Produkt přidán");
    }

    public function destroy($id, DeleteProductService $deleteProductService)
    {
        $deleteProductService->make($id);
        return redirect()->route('admin.product.index')->withSuccess('Produkt smazán');
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->all();

        //helper nebo tak něco udělat, budu asi používat častěji
        $selected_category = $this->selectedCategory($product);

        return view('admin.product.edit', [
            'product' => $product,
            'categories' =>  $categories,
            'selected_category' => $selected_category
        ]);
    }

    public function update($id, ProductUpdateRequest $request, UpdateProductService $updateProductService)
    {
        //musím získat obrázky a pak editovat
        $updateProductService->make($id, $request->all());
        return redirect()->route('admin.product.index')->withSuccess("Produkt editován");
    }
    //------------ private ------------
    private function selectedCategory($product)
    {
        $selected_category = [];
        foreach ($product->categories as $category) {
            $selected_category[$category->id] = $category->id;
        }
        return $selected_category;
    }
}
