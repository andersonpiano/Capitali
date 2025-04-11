<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
