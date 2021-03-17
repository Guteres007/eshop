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
            $attributes['price_without_vat'] = number_format($attributes['price'] / config('price.tax_rate'), config('price.decimals'));
        } else {
            $attributes['price_without_vat'] = number_format($attributes['price'], config('price.decimals'));
        }
        $calculate['tax'] = config('price.tax');
        $calculate['price_margin'] = $attributes['price'] - $attributes['shopping_price'];
        $attributes += $calculate;
        return $this->productRepository->create($attributes);
    }
}
