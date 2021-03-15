<?php

namespace App\Repositories;

interface RepositoryInterface
{

    public function all();

    public function find($id);

    public function create(array $attributes);

    public function delete($id);
    // more
}
