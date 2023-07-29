<?php

namespace App\Services\Parking\Actions;

use App\Models\Parking;
use App\Services\Parking\DTOs\CreateParkingDTO;

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
