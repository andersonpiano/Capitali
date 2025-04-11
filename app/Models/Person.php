<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'cpf',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function deliveriesEpi()
    {
        return $this->hasMany(DeliveryEpi::class);
    }
}
