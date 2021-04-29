<?php

namespace App\Models;

use App\DataObjects\PriceDataObject;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'internal_id',
        'name',
        'description',
        'short_description',
        'long_description',
        'price_without_vat',
        'price',
        "price_margin",
        'shopping_price',
        'tax',
        'quantity',
        "slug",
        'active',
        'ean',
        'temporary'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    //Todo: Refaktorovat


    public function getPriceAttribute($value)
    {
        return new PriceDataObject($value);
    }


    public function getPriceMarginAttribute($value)
    {
        return new PriceDataObject($value);
    }


    public function getPriceWithoutVatAttribute($value)
    {
        return new PriceDataObject($value);
    }


    public function getShoppingPriceAttribute($value)
    {
        return new PriceDataObject($value);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'product_parameter');
    }
}
