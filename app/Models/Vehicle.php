<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'id',
        'driver_id',
        'license_plate',
        'type'
    ];

    public function driver(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Driver::class, 'driver_id');
    }

    public function parkings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Parking::class);
    }
}
