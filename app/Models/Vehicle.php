<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'plate',
        'model',
        'brand',
        'year',
        'mileage',
        'status',
        'garage_id',
    ];
    
    public function garage()
    {
        return $this->belongsTo(Garage::class);
    }
}
