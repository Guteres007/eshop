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
        return $this->model->create($attributes);
    }
}
