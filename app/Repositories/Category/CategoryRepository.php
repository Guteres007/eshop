<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $slug = ['slug' => Str::slug($attributes->input('name'))];
        $formRequest += $slug;
        $this->model->create($formRequest);
    }
}
