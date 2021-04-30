<?php

namespace App\Repositories;

use App\Models\Parameter;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class ParameterRepository extends BaseRepository
{
    protected $model;

    public function __construct(Parameter $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function getParameterNamesByCategory($category_id)
    {

        return DB::table('category_product')
            ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
            ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
            ->join('products', 'product_parameter.product_id', 'products.id')
            ->where('category_product.category_id', $category_id)
            ->where('active', true)
            ->select('parameters.name')
            ->groupBy('parameters.name')
            ->get();
    }

    public function getParameterValuesByCategory($category_id)
    {
        return DB::table('category_product')
            ->join('product_parameter', 'category_product.product_id', 'product_parameter.product_id')
            ->join('parameters', 'product_parameter.parameter_id', 'parameters.id')
            ->join('products', 'product_parameter.product_id', 'products.id')
            ->where('category_product.category_id', $category_id)
            ->where('active', true)
            ->select('parameters.value', 'parameters.id', 'parameters.name')
            ->groupBy('parameters.value', 'parameters.id', 'parameters.name')
            ->get();
    }
}
