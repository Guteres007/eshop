<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
        'price'
    ];
    protected $table = 'delivery_payment';
}
