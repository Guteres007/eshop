<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'active',
        'hash'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function cart_products()
    {
        return $this->hasMany(CartProduct::class);
    }
}
