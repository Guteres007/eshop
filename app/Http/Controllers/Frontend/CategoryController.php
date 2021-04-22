<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {
        //Varianta jedna Pokud existuje pod stejným názvem parametru, tak přidat pod tento id parametr
        //varianta dva. předem nadefinované
        //??každý parametr bude mít jen jednu hodnotu  Parameter.value_id -> values.id
        $parameters_name = DB::table('category_product')
            ->rightJoin('parameters', 'parameters.product_id', '=', 'category_product.product_id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.name')
            ->groupBy('parameters.name')
            ->get()->unique();

        $parameters_value = DB::table('parameters')
            ->join('parameter_value', 'parameters.id', '=', 'parameter_value.parameter_id')
            ->select('parameter_value.value', 'parameter_value.parameter_id')
            ->groupBy('parameter_value.value')
            ->groupBy('parameter_value.parameter_id')
            ->get()->unique();

        dd($parameters_name, $parameters_value);
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
