<?php

namespace App\Http\Controllers\Frontend;

use App\DataObjects\PriceDataObject;
use App\Models\Category;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Collection;


class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {
        //http://localhost:8000/category/pocitace?materi%C3%A1l=k%C5%AF%C5%BEe


        $query = explode(";", $request->query('parameters'));
        if ($request->query()) {
            //service

            $products =
                DB::table('category_product')
                ->leftJoin(
                    'parameters',
                    function ($join) {
                        $join->on('category_product.product_id', '=', 'parameters.product_id')
                            ->where(function ($q) {
                                $q->where('parameters.name', 'Barva')
                                    ->where('parameters.value', 'Fialová');
                            })
                            ->orWhere(function ($q) {
                                $q->where('parameters.name', 'Barva')
                                    ->where('parameters.value', 'Červená');
                            })
                            ->orWhere(function ($q) {
                                $q->where('parameters.name', 'Material')
                                    ->where('parameters.value', 'Kožešina');
                            });
                    }
                )

                ->leftJoin('products', 'parameters.product_id', '=', 'products.id')
                ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
                ->where('category_product.category_id', $category->id)
                ->where('product_images.rank', 1)
                ->where('products.active', true)
                ->distinct()

                ->select('products.*', DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'));
            //dd($products->toSql());
            /*
            foreach ($query as  $key => $row) {
                $newParameters = explode(':', $row);
                ->where('parameters.name', 'like',  ucfirst($newParameters[0]))
                ->where('parameter_value.value', 'like', ucfirst($newParameters[1]))
            }*/
            //tady to potřebuji opravit
            //$products = (new Collection($products_array))->flatten()->unique('id');

            //wherein pro price

        } else {
            //Repository
            $products = DB::table('category_product')
                ->leftJoin('products', 'products.id', '=', 'category_product.product_id')
                ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
                ->where('category_product.category_id', $category->id)
                ->where('product_images.rank', 1)
                ->where('products.active', true)
                ->select('products.*', DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'));
        }

        //services
        $parameters_name = DB::table('category_product')
            ->rightJoin('parameters', 'parameters.product_id', '=', 'category_product.product_id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.name', 'parameters.value')
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
