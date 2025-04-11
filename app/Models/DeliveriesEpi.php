<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveriesEpi extends Model
{

    protected $fillable = [
        'person_id',
        'equipment_id',
        'delivered_at',
        'expiration_at',
    ];

    protected $dates = [
        'delivered_at',
        'expires_at',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
