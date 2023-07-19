<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'id',
        'number'
    ];

    public function parkings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Parking::class);
    }
}
