<?php

namespace App\Services\Frontend\Product;

use App\Repositories\Category\CategoryRepository;

class ProductService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getActiveProductsByCategorySlug(string $slug)
    {
        return $this->categoryRepository->getModel()->where('slug', $slug)->first()->products->where('active', true);
    }
}
