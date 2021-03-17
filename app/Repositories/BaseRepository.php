<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

class BaseRepository implements RepositoryInterface
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function update($id, $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    public function allPaginate()
    {
        return $this->model->orderBy('id', 'desc')->paginate(10);
    }
}
