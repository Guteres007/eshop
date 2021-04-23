<?php

namespace App\Services\Admin\Parameter;

use App\Models\Product;
use App\Models\Parameter;
use App\Models\ParameterValue;

class ParameterService
{

    public function saveParametersToProduct(Product $product, $parameters)
    {




        for ($i = 0; $i < count($parameters['name']); $i++) {
            if (strlen($parameters['name'][$i]) && strlen($parameters['name'][$i])) {
                $parameterModel = new Parameter(['name' => $parameters['name'][$i], 'value' => $parameters['value'][$i]]);
                $product->parameters()->save($parameterModel);
            }
        }
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
