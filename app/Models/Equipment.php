<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function deliveriesEpi()
    {
        return $this->hasMany(DeliveryEpi::class);
    }
}
