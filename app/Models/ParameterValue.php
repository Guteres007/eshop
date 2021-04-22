<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    use HasFactory;

    protected $table = 'parameter_value';
    protected $fillable = [
        'value'
    ];

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
