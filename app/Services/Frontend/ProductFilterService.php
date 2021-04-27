<?php

namespace App\Services\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Product\ProductRepository;

class ProductFilterService
{

    private $productRepository;
    private $parameter_ids;
    private $price;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //Zatím request, není to čisté řešení, ale v budoucn use bude pridávat více parametrů, takže zatím nechám takto

    public function filter(Request $request, $category_id)
    {
        $base_sql = DB::table('category_product')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id');



        $filter = $request->query('filter');
        if ($filter) {

            if (isset($filter['parameters'])) {
                //  Dvakrát
                $patrameters = explode(",", $filter['parameters']);
                $remove_empty_values_in_array = array_filter($patrameters);
                $this->parameter_ids = collect($remove_empty_values_in_array)->map(function ($id) {
                    if (is_numeric($id)) {
                        return $id;
                    };
                });

                $base_sql = $base_sql->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
                    ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
                    ->whereIn('product_parameter.parameter_id', $this->parameter_ids);
            }
            //  Dvakrát
            if (isset($filter['price'])) {
                $patrameters = explode(":", $filter['price']);
                $remove_empty_values_in_array = array_filter($patrameters);
                $this->price = collect($remove_empty_values_in_array)->map(function ($price) {
                    if (is_numeric($price)) {
                        return $price;
                    };
                });

                //$base_sql = $base_sql->whereRaw('CAST(products.price AS DECIMAL(10,2)) BETWEEN 1.00 and 9000.00');

                $base_sql = $base_sql->whereBetween('products.price', [777, 779]);

                //order by ??
                //dd(->where('product_images.rank', 1));
            }
            return $base_sql
                ->where('category_product.category_id', $category_id)
                ->where('products.active', true)
                ->distinct()
                ->select('products.*', DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'));
        } else {
            return $this->productRepository->getProductsByCategory($category_id);
        }
    }

    /**
     * Get the value of parameter_ids
     */
    public function getParameter_ids(): array
    {
        return $this->parameter_ids ? $this->parameter_ids->toArray() : [];
    }

    /**
     * Get the value of price
     */
    public function getPrice(): array
    {
        return $this->price ? ['min' => $this->price->toArray()[0], 'max' => $this->price->toArray()[1]] : ['min' => 0, "max" => 0];
    }
}
