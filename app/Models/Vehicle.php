<?php

namespace App\Models;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'driver_id',
        'license_plate',
        'type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'type' => VehicleType::class
    ];

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class, 'driver_id');
    }

    public function parkings(): HasMany
    {
        return $this->hasMany(Parking::class);
    }
}
