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
            'products' => $categoryRepository
                ->getModel()
                ->find($category->id)
                ->products()
                ->where('active', true)
                ->paginate(20)
        ]);
    }
}
