<?php

namespace App\Services\Parking\Price;

use App\Models\Parking;

class TruckPrice extends ParkingPrice
{
    protected float $initialPrice = 10.00;
    protected ?float $pricePerHalfHour = 4.00;

    public function __construct(private readonly Parking $parking)
    {
        parent::__construct($this->parking);
    }
}
