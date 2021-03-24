<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
    public function getActiveProductsByCategorySlug($slug)
    {
        return $this->model->where('slug', $slug)->first()->products;
    }
}
