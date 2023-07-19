<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'id',
        'vehicle_id',
        'box_id',
        'user_id',
        'entrance_time',
        'exit_time',
        'price'
    ];

    public function vehicle(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function box(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Box::class);
    }
}
