<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'id',
        'street',
        'number',
        'complement',
        'zipcode'
    ];

    public function establishment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Establishment::class);
    }
}
