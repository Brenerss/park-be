<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Box extends Model
{
    protected $fillable = [
        'id'
    ];

    public function parkings(): HasMany
    {
        return $this->hasMany(Parking::class);
    }
}
