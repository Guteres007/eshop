<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class)->withPivot('price', 'active');
    }
}