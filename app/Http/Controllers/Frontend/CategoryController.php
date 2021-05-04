<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ParameterRepository;
use App\Services\Frontend\ProductFilterService;

class CategoryController extends Controller
{
    public function show(
        Category $category,
        Request $request,
        CategoryRepository $categoryRepository,
        ProductFilterService $productFilterService,
        ParameterRepository $parameterRepository
    ) {
        //Předělat na builder pattern
        $productFilterService->setCategory_id($category->id);
        $products = $productFilterService->filter($request);
        $active_parameters = $productFilterService->getParameter_ids();
        $filtered_price = $productFilterService->getPrice();
        $parameter_names = $parameterRepository->getParameterNamesByCategory($category->id);
        $parameter_values = $parameterRepository->getParameterValuesByCategory($category->id);
        $ordering = $request->query('order');

        $min_price =  Category::find($category->id)->products()->where('active', true)->min('price');
        $min_action_price = Category::find($category->id)->products()->where('active', true)->min('action_price');

        if ($min_price > $min_action_price && $min_action_price > 0) {
            $price_min = $min_action_price;
        } else {
            $price_min = $min_price;
        }


        return view('frontend.category.show', [
            'products' => $products->paginate(20),
            'category' => $category,
            'cartegories' => $categoryRepository->all(),
            'price_max' =>  Category::find($category->id)->products()->where('active', true)->max('price'),
            'price_min' => $price_min,
            'parameters' => $parameter_names,
            'parameter_values' => $parameter_values,
            'active_parameters' => $active_parameters,
            'filtered_price' => $filtered_price,
            'ordering' => $ordering
        ]);
    }
}
