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
            $attributes['price_without_vat'] = $attributes['price'] / config('price.tax_rate');
        } else {
            $attributes['price_without_vat'] = $attributes['price'];
        }
        $calculate['tax'] = config('price.tax');
        $calculate['price_margin'] = $attributes['price'] - $attributes['shopping_price'];
        $attributes += $calculate;

        $array_of_category_ids = $attributes['category_id'];

        $product = $this->productRepository->find($id);
        //není-li parametr,
        if (isset($attributes['parameters'])) {
            $this->parameterService->saveParametersToProduct($product, $attributes['parameters']);
        } else {
            $this->parameterService->removeParametersByProduct($product);
        }
        $product->update($attributes);
        $product->categories()->sync($array_of_category_ids);

        return true;
    }
}
