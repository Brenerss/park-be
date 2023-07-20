<?php

namespace App\Actions\Parking;

use App\DTOs\Parking\CreateParkingDTO;
use App\Models\Parking;

class CreateParkingAction
{
    public function execute(CreateParkingDTO $data): void
    {
        $fromBox = $data->box->parkings()->latest()->first();
        if ($fromBox && !$fromBox->exit_time) return;

        $fromVehicle = $data->vehicle->parkings()->latest()->first();
        if ($fromVehicle && !$fromBox->exit_time) return;

        Parking::create(CreateParkingDTO::toPersistence($data));
    }
}
