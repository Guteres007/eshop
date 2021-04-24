<?php

namespace App\Http\Controllers\Frontend;

use App\DataObjects\PriceDataObject;
use App\Models\Category;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductParameter;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Collection;


class CategoryController extends Controller
{
    public function show(Category $category, Request $request, CategoryRepository $categoryRepository)
    {

        $parameter_ids = explode(";", $request->query('parameters'));
        if ($request->query()) {
            //service
            $products =
                DB::table('category_product')
                ->join('products', 'category_product.product_id', '=', 'products.id')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
                ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
                ->where('category_product.category_id', $category->id)
                ->whereIn('product_parameter.parameter_id', $parameter_ids) //zelená
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
        $parameter_names = DB::table('category_product')
            ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
            ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.name')
            ->groupBy('parameters.name')
            ->get();


        $parameter_value = DB::table('category_product')
            ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
            ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
            ->where('category_product.category_id', $category->id)
            ->select('parameters.value', 'parameters.id', 'parameters.name')
            ->groupBy('parameters.value', 'parameters.id', 'parameters.name')
            ->get();

        //dd($parameter_value);

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
