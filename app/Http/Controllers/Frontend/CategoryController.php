<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    public function show(Category $category, CategoryRepository $categoryRepository)
    {

        return view('frontend.category.show', [
            'products' => $categoryRepository->getActiveProductsByCategorySlug($category->slug)
        ]);
    }
}
