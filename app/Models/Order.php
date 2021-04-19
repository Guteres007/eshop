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
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
