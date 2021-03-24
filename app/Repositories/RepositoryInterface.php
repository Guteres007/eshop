<?php

namespace App\Repositories;

interface RepositoryInterface
{

    public function all();

    public function find($id);

    public function create($attributes);

    public function delete($id);

    public function update($id, $attributes);

    public function allPaginate();

    public function where($query);

    public function whereLike($query, $text);

    public function getModel();
}
