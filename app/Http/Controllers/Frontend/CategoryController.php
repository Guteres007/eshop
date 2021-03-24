<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Services\Frontend\Product\ProductService;

class CategoryController extends Controller
{
    public function show(Category $category, ProductService $productService)
    {

        //TODO: předělat na service Product/ProductService :: getActiveProducts
        return view('frontend.category.show', [
            'products' => $productService->getActiveProductsByCategorySlug($category->slug)
        ]);
    }
}
