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
                $parameterModel = new Parameter(['name' => $parameters['name'][$i]]);
                $parameterValueModel = new ParameterValue(['value' => $parameters['value'][$i]]);
                $newPaprameter = $product->parameters()->save($parameterModel);
                $newPaprameter->parameter_values()->save($parameterValueModel);
            }
        }
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
