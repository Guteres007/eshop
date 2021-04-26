<?php

namespace App\Services\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Product\ProductRepository;

class ProductFilterService
{

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //Zatím request, není to čisté řešení, ale v budoucn use bude pridávat více parametrů, takže zatím nechám takto

    public function filter(Request $request, $category_id)
    {
        //Mělo by to být někde jinde. Zatím nechávám protože refaktoring není momentálně potřeba
        $patrameters = explode(";", $request->query('parameters'));
        $remove_empty_values_in_array = array_filter($patrameters);
        $parameter_ids = collect($remove_empty_values_in_array)->map(function ($id) {
            if (is_numeric($id)) {
                return $id;
            };
        });

        if ($request->query()) {
            return
                DB::table('category_product')
                ->join('products', 'category_product.product_id', '=', 'products.id')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
                ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
                ->where('category_product.category_id', $category_id)
                ->whereIn('product_parameter.parameter_id', $parameter_ids) //zelená
                ->where('product_images.rank', 1)
                ->where('products.active', true)
                ->distinct()
                ->select('products.*', DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'));
        } else {
            return $this->productRepository->getProductsByCategory($category_id);
        }
    }
}
