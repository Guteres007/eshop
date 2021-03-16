<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Helpers\Slug\SlugHelper;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function create($attributes)
    {
        //TODO: helper pro slugy udělat
        $formRequest = $attributes->all();
        $slug = ['slug' => SlugHelper::createSlug($attributes->input('name'), 'categories')];
        $formRequest += $slug;
        return $this->model->create($formRequest);
    }
}
