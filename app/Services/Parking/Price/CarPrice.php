<?php

namespace App\Services\Parking\Price;

use App\Models\Parking;

class CarPrice extends ParkingPrice
{
    protected float $initialPrice = 8.00;
    protected ?float $pricePerHalfHour = 2.00;

    public function __construct(private readonly Parking $parking)
    {
        parent::__construct($this->parking);
    }
}
