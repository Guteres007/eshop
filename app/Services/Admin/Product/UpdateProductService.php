<?php

namespace App\Services\Admin\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\Admin\Parameter\ParameterService;

class UpdateProductService
{
    private $productRepository;
    private $parameterService;

    public function __construct(ProductRepository $productRepository, ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
        $this->productRepository = $productRepository;
    }

    public function make($id, array $attributes)
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

        $array_of_category_ids = $attributes['category_id'];

        $product = $this->productRepository->find($id);

        //update parametrů pokud bude v databázi
        if ($product->parameters()->count() > 0) {
            $this->parameterService->removeParametersByProduct($product);
        }

        $this->parameterService->saveParametersToProduct($product, $attributes['parameters']);
        $product->update($attributes);
        $product->categories()->sync($array_of_category_ids);

        return true;
    }
}
