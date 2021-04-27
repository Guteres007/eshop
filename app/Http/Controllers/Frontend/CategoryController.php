<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $productFilterService->setCategory_id($category->id);
        $products = $productFilterService->filter($request);
        $active_parameters = $productFilterService->getParameter_ids();
        $filtered_price = $productFilterService->getPrice();
        $parameter_names = $parameterRepository->getParameterNamesByCategory($category->id);
        $parameter_values = $parameterRepository->getParameterValuesByCategory($category->id);
        return view('frontend.category.show', [
            'products' => $products->paginate(20),
            'category' => $category,
            'cartegories' => $categoryRepository->all(),
            'price_max' => $products->max('price'),
            'price_min' => $products->min('price'),
            'parameters' => $parameter_names,
            'parameter_values' => $parameter_values,
            'active_parameters' => $active_parameters,
            'filtered_price' => $filtered_price
        ]);
    }
}
