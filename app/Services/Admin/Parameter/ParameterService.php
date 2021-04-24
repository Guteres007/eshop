<?php

namespace App\Services\Admin\Parameter;

use App\Models\Product;
use App\Models\Parameter;
use App\Models\ParameterValue;

class ParameterService
{

    public function saveParametersToProduct(Product $product, $parameters)
    {
        $product->parameters()->sync($parameters['id']);
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
