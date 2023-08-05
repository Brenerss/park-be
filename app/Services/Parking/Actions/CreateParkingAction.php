<?php

namespace App\Services\Parking\Actions;

use App\Models\Parking;
use App\Services\Parking\DTOs\CreateParkingDTO;
use Exception;

class CreateParkingAction
{
    /**
     * @throws Exception
     */
    public function execute(CreateParkingDTO $data): Parking
    {
        $fromBox = $data->box->parkings()->latest()->first();
        if ($fromBox && !$fromBox->exit_time) {
            Throw new Exception('Box busy');
        };

        $fromVehicle = $data->vehicle->parkings()->latest()->first();
        if ($fromVehicle && !$fromBox?->exit_time) {
            Throw new Exception('Car already parked');
        };

        $park = new Parking(CreateParkingDTO::toPersistence($data));
        $park->save();

        return $park;
    }
}
