<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Models\Parameter;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {

        $parameters_name = DB::table('category_product')
            ->rightJoin('parameters', 'parameters.product_id', '=', 'category_product.product_id')
            ->rightJoin('parameter_value', 'parameters.id', '=', 'parameter_value.parameter_id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.name', 'parameter_value.value')
            ->get();


        $parameter_name_array['name'] = [];
        $parameter_name_array['values'] = [];
        foreach ($parameters_name as $parameter) {
            //Pokud nebude name vytvořím nový
            if (!in_array($parameter->name, $parameter_name_array['name'])) {
                $parameter_name_array['name'][] = $parameter->name;
            }

            if (in_array($parameter->name, $parameter_name_array['name'])) {
                $index = array_search($parameter->name, $parameter_name_array['name']);
                $parameter_name_array['values'][] = [$index => $parameter->value];
            }
        }

        $reduce_array = [];
        foreach ($parameter_name_array['values'] as $value) {

            foreach ($value as $key => $name) {
                $reduce_array[$key][] = $name;
            }
        }

        $parameter_values_array = collect($reduce_array)->map(function ($parameter) {
            return collect($parameter)->unique();
        });

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
            'price_min' => $products->min('price'),
            'parameters' => $parameter_name_array,
            'parameter_values' => $parameter_values_array
        ]);
    }
}
