<?php

namespace App\Helpers;

use App\DataObjects\PriceDataObject;

class PriceHelper
{
    static function format_price_with_currency($price)
    {

        return (new PriceDataObject($price))->price_with_currency();
    }
}
