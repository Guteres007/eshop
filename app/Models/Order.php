<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'first_name',
        'last_name',
        'email',
        'postcode',
        'street',
        'comment',
        'delivery_id',
        'payment_id',
        'delivery_name',
        'delivery_price',
        'payment_name',
        'payment_price',
        'phone'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
