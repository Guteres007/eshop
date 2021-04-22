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
                $parameter = new Parameter(['name' => $parameters['name'][$i]]);
                $paramValue = new ParameterValue(['value' => $parameters['value'][$i]]);
                $newParamName = $product->parameters()->save($parameter);
                $newParamName->values()->save($paramValue);
            }
        }
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
