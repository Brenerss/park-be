<?php

namespace App\Services\Parking\DTOs;

use App\Http\Requests\Parking\StoreParkingRequest;
use App\Models\Box;
use App\Models\User;
use App\Models\Vehicle;

class CreateParkingDTO
{
    public function __construct(
        public Box     $box,
        public Vehicle $vehicle,
        public User    $user
    )
    {
    }

    public static function fromRequest(StoreParkingRequest $request, $user): self
    {
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $box = Box::findOrFail($request->box_id);

        return new self(
            box: $box,
            vehicle: $vehicle,
            user: $user,
        );
    }

    public static function toPersistence(self $data): array
    {
        return [
            'box_id' =>  $data->box->id,
            'vehicle_id' => $data->vehicle->id,
            'user_id' => $data->user->id
        ];
    }

}
