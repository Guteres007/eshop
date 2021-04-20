<?php

namespace App\Services\Admin\Parameter;

use App\Models\Product;
use App\Models\Parameter;

class ParameterService
{

    public function saveParametersToProduct(Product $product, $parameters)
    {
        for ($i = 0; $i < count($parameters['name']); $i++) {
            if (strlen($parameters['name'][$i]) && strlen($parameters['name'][$i])) {
                $parameter = new Parameter(['value' => $parameters['value'][$i], 'name' => $parameters['name'][$i]]);
                $product->parameters()->save($parameter);
            }
        }
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
