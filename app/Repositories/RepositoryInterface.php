<?php

namespace App\Repositories;

interface RepositoryInterface
{

    public function all();

    public function find($id);

    public function create($attributes);

    public function delete($id);
}
