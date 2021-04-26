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

        $products = $productFilterService->filter($request, $category->id);
        $parameter_names = $parameterRepository->getParameterNamesByCategory($category->id);
        $parameter_value = $parameterRepository->getParameterValuesByCategory($category->id);

        return view('frontend.category.show', [
            'products' => $products->paginate(20),
            'category' => $category,
            'cartegories' => $categoryRepository->all(),
            'price_max' => $products->max('price'),
            'price_min' => $products->min('price'),
            'parameters' => $parameter_names,
            'parameter_values' => $parameter_value
        ]);
    }
}
