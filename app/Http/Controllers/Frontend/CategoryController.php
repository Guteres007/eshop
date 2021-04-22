<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {

        dd(DB::table('category_product')
            ->join('parameters', 'parameters.product_id', '=', 'category_product.product_id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.name')
            ->groupBy('parameters.name')
            ->get());

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
