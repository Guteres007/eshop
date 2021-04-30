<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builders\Admin\ProductBuilder;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Services\Admin\Product\DeleteProductService;
use App\Services\Admin\Product\UpdateProductService;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Services\Files\FolderRemover;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->middleware('optimizeImages')->only(['store', 'update']);
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

    public function create($id, FolderRemover $folderRemover)
    {
        $product = Product::find($id);
        $folderRemover->setDestionation('/product-images/');
        $folderRemover->make($id);
        $product->images()->delete();
        $categories = $this->categoryRepository->all();
        $parameters = Parameter::all();

        return view('admin.product.create', ['categories' => $categories, 'parameters' => $parameters, 'product' => $product]);
    }

    public function store(ProductCreateRequest $request, ProductBuilder $productBuilder)
    {

        // dd($request->input('parameters'));
        $productBuilder
            ->createProduct($request->all())
            ->createParameters($request->all());

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
        $parameters = Parameter::all();

        //helper nebo tak něco udělat, budu asi používat častěji
        $selected_category = $this->selectedCategory($product);

        return view('admin.product.edit', [
            'product' => $product,
            'categories' =>  $categories,
            'selected_category' => $selected_category,
            'parameters' => $parameters
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
