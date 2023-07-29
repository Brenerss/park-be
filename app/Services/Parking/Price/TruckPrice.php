<?php

namespace App\Services\Parking\Price;

use App\Services\Parking\Price\Contracts\IParkingPrice;

class TruckPrice extends BasePrice
{
    protected float $initialPrice = 10.00;
    protected ?float $pricePerHalfHour = 4.00;

    public function calculate()
    {
        // TODO: Implement calculate() method.
    }
}
