<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {
        $products = $categoryRepository
            ->getModel()
            ->find($category->id)
            ->products()
            ->where('active', true);

        return view('frontend.category.show', [
            'products' => $products->paginate(20),
            'category' => $category,
            'cartegories' => $categoryRepository->all(),
            'price_max' => $products->max('price'),
            'price_min' => $products->min('price')
        ]);
    }
}
