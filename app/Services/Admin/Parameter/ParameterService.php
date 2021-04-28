<?php

namespace App\Services\Admin\Parameter;

use App\Models\Product;
use App\Models\Parameter;
use App\Models\ParameterValue;

class ParameterService
{

    public function saveParametersToProduct(Product $product, $parameters)
    {

        if (
            !empty(array_filter($parameters['name'])) &&
            !empty(array_filter($parameters['value']))
        ) {
            for ($i = 0; $i < count($parameters['name']); $i++) {
                $is_existing_parameter = Parameter::where('name',  $parameters['name'][$i])->first();
                $is_existing_value = Parameter::where('value',  $parameters['value'][$i])->first();

                if ($is_existing_parameter && $is_existing_value) {
                    $product->parameters()->sync($is_existing_value->id);
                } else if ($is_existing_parameter) {
                    $parameter = Parameter::create([
                        'name' => $is_existing_parameter->name,
                        'value' => $parameters['value'][$i]
                    ]);
                    $product->parameters()->sync($parameter->id);
                } else {
                    $parameter = Parameter::create([
                        'name' => $parameters['name'][$i],
                        'value' => $parameters['value'][$i]
                    ]);
                    $product->parameters()->sync($parameter->id);
                }
            }
        }
    }

    public function removeParametersByProduct($product)
    {
        return $product->parameters()->delete();
    }
}
