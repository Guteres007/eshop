<?php

namespace App\Models;

use App\DataObjects\PriceDataObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'city',
        'comment',
        'delivery_id',
        'payment_id',
        'delivery_name',
        'delivery_price',
        'payment_name',
        'payment_price',
        'phone',
        'hash',
    ];


    public function getPriceAttribute($value)
    {
        return new PriceDataObject($value);
    }

    public function setUniqIdAttribute($value) {
        return  $this->attributes['uniq_id'] = date("Y-m") . "-" . str_pad($value, 6, "0", STR_PAD_LEFT);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function order_status() {
        return $this->hasOne(OrderStatus::class);
    }
}
