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
    private $category_id;
    private $sql_query;
    private $filter;
    private $ordering;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //Zatím request, není to čisté řešení, ale v budoucn use bude pridávat více parametrů, takže zatím nechám takto

    public function filter(Request $request)
    {
        $this->ordering = $request->query('order');
        $this->filter = $request->query('filter');

        $this->sql_query = DB::table('category_product')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->leftJoin('order_item', 'products.id', '=', 'order_item.product_id');
        if ($this->filter || $this->ordering) {
            //Builder
            $this->setParameters();
            $this->setPrice();
            return $this->execute();
        } else {
            return $this->productRepository->getProductsByCategory($this->category_id);
        }
    }

    private function setParameters()
    {
        if (isset($this->filter['parameters'])) {
            $patrameters = explode(',', $this->filter['parameters']);
            $remove_empty_values_in_array = array_filter($patrameters);
            $this->parameter_ids = collect($remove_empty_values_in_array)->map(function ($id) {
                if (is_numeric($id)) {
                    return $id;
                };
            });

            $this->sql_query = $this->sql_query->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
                ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
                ->whereIn('product_parameter.parameter_id', $this->parameter_ids);
        }
    }

    private function setPrice()
    {
        if (isset($this->filter['price'])) {

            $patrameters = explode(":", $this->filter['price']);
            $remove_empty_values_in_array = array_filter($patrameters);
            $this->price = collect($remove_empty_values_in_array)->map(function ($id) {
                if (is_numeric($id)) {
                    return $id;
                };
            });

            if (isset($this->price[0]) && $this->price[1]) {
                $this->price = ['min' => $this->price[0], 'max' => $this->price[1]];
            } else {
                $this->price = [];
            }

            if (count($this->price)) {
                $this->sql_query = $this->sql_query->whereBetween(
                    'products.price',
                    [(int)$this->price['min'], (int)$this->price['max']]
                );
            }
        }
    }

    private function execute()
    {
        $this->sql_query
            ->where('category_product.category_id', $this->category_id)
            ->where('products.active', true)
            ->where('product_images.rank', 1)
            ->distinct();

        $this->sql_query =  $this->sql_query->select('products.*', DB::raw('count(order_item.product_id) as sales'), DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'))
            ->groupBy('products.id', 'image_path', 'image_name');

        if ($this->ordering) {
            $this->sql_query =  $this->sql_query->orderBy('sales', 'DESC');
        }

        return $this->sql_query;
    }



    public function getParameter_ids(): array
    {
        return $this->parameter_ids ? $this->parameter_ids->toArray() : [];
    }

    public function getPrice(): array
    {
        return $this->price ?
            $this->price : ['min' => 0, "max" => 0];
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
}
