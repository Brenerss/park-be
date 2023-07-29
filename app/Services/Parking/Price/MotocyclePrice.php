<?php

namespace App\Services\Parking\Price;

use App\Services\Parking\Price\Contracts\IParkingPrice;

class MotocyclePrice extends ParkingParkingPrice
{
    public float $initialPrice = 5.00;
}
