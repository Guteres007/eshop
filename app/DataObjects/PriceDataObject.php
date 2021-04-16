<?php

namespace App\DataObjects;

//všude kde jsou number_format předělat na data objekt
class PriceDataObject
{
    private $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function raw()
    {
        return  $this->value;
    }

    public function formated()
    {
        return number_format($this->value, config('price.decimals'),  config('price.decimals_point'),  config('price.thousands_separator'));
    }

    public function price_with_currency()
    {
        return number_format($this->value, config('price.decimals')) . config('price.currency');
    }
}
