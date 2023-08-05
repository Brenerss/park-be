<?php

namespace App\Services\Parking\Actions;

use App\Enums\VehicleType;
use App\Models\Parking;
use App\Services\Parking\Price\CarPrice;
use App\Services\Parking\Price\MotocyclePrice;
use App\Services\Parking\Price\TruckPrice;
use Carbon\Carbon;
use Exception;

class LeaveParkingAction
{
    /**
     * @throws Exception
     */
    public function execute(Parking $parking): Parking
    {
        if ($parking->exit_time) {
            Throw new Exception('Car already leaved');
        }

        $class = match ($parking->vehicle->type) {
            VehicleType::CAR => CarPrice::class,
            VehicleType::TRUCK => TruckPrice::class,
            VehicleType::MOTORCYCLE => MotocyclePrice::class,
            default => null,
        };

        $price = $class ? (new $class($parking))->calculate() : 0;

        $parking->update([
            'price' => $price,
            'exit_time' => Carbon::now(new \DateTimeZone('America/Sao_Paulo'))
        ]);

        return $parking;
    }
}
