<?php

namespace App\Services\Parking\Price;
use App\Models\Parking;

class MotorcyclePrice extends ParkingPrice
{
    public float $initialPrice = 5.00;

    public function __construct(private readonly Parking $parking)
    {
        parent::__construct($this->parking);
    }
}
