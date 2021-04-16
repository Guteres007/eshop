<?php

namespace App\Services\Admin\Product;

use App\Repositories\Product\ProductRepository;

class CreateProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function make(array $attributes)
    {
        if (!isset($attributes['active'])) {
            $calculate['active'] = false;
        }
        if (!strlen($attributes['price_without_vat'])) {
            $attributes['price_without_vat'] = $attributes['price'] / config('price.tax_rate');
        } else {
            $attributes['price_without_vat'] = $attributes['price'];
        }
        $calculate['tax'] = config('price.tax');
        $calculate['price_margin'] = $attributes['price'] - $attributes['shopping_price'];
        $attributes += $calculate;

        $array_of_category_ids = $attributes['category_id'];

        $product = $this->productRepository->create($attributes);
        $product->categories()->attach($array_of_category_ids);

        return $product;
    }
}
