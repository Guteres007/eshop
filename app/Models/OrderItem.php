<?php

namespace App\Models;

use App\DataObjects\PriceDataObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';
    protected $fillable = [
        'internal_id',
        'product_id',
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

    public function getPriceAttribute($value)
    {
        return new PriceDataObject($value);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
