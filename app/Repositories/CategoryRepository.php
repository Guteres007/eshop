<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\RepositoryInterface;

class CategoryRepository implements RepositoryInterface
{
    public function all()
    {
        return Category::all();
    }
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $attributes)
    {
        return Category::create($attributes);
    }

    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}
