<?php

namespace App\Services\Parking\Price\Contracts;

interface IParkingPrice
{
    public function calculate(): float|int;
}
