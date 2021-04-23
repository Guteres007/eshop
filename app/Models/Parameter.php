<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(ucfirst($value));
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = trim(ucfirst($value));
    }
}
