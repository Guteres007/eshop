<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function create($attributes)
    {
        $array_of_category_ids = $attributes['category_id'];

        $product = $this->model->create($attributes);
        foreach ($array_of_category_ids as $category_id) {
            $product->category()->attach($category_id);
        }

        return $this;
    }
}
