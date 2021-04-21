<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_id',
        'name',
        'description',
        'short_description',
        'long_description',
        'price_without_vat',
        'price',
        'price_margin',
        'shopping_price',
        'tax',
        'quantity',
        "slug",
        'ean',
    ];
}
