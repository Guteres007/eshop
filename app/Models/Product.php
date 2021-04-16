<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
    public function setPriceAttribute($value)
    {

        $this->attributes['price'] = number_format($value, config('price.decimals'));
    }

    public function setPriceMarginAttribute($value)
    {
        $this->attributes['price_margin'] = number_format($value, config('price.decimals'));
    }

    public function setPriceWithoutVatAttribute($value)
    {
        $this->attributes['price_without_vat'] = number_format($value, config('price.decimals'));
    }

    public function setShoppingPriceAttribute($value)
    {
        $this->attributes['shopping_price'] = number_format($value, config('price.decimals'));
    }


    public function getPriceAttribute($value)
    {
        return  number_format($value, config('price.decimals'));
    }


    public function getPriceMarginAttribute($value)
    {
        return  number_format($value, config('price.decimals'));
    }


    public function getPriceWithoutVatAttribute($value)
    {
        return  number_format($value, config('price.decimals'));
    }


    public function getShoppingPriceAttribute($value)
    {
        return  number_format($value, config('price.decimals'));
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
}
