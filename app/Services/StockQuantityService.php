<?php

namespace App\Services;

use App\Models\Product;

class StockQuantityService
{
    public function productHasQuantity($product_id, $quantity)
    {
        if (Product::find($product_id)->quantity >= $quantity) {
            return true;
        };
        return false;
    }
}
