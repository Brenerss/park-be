<?php

namespace App\Actions\Parking;

use App\Models\Parking;
use App\Services\Parking\Price\CarPrice;
use Carbon\Carbon;

class LeaveParkingAction
{
    public function execute(Parking $parking): Parking
    {
        $price = (new CarPrice($parking))->calculate();

        $parking->update([
            'price' => $price,
            'exit_time' => Carbon::now(new \DateTimeZone('America/Sao_Paulo'))
        ]);

        return $parking;
    }
}
