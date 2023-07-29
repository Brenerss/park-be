<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parking\StoreParkingRequest;
use App\Models\Parking;
use App\Models\User;
use App\Services\Parking\Actions\CreateParkingAction;
use App\Services\Parking\Actions\LeaveParkingAction;
use App\Services\Parking\DTOs\CreateParkingDTO;

class ParkingsController extends Controller
{
    public function index()
    {
    }

    public function store(StoreParkingRequest $request)
    {
        $user = User::find(1);
        (new CreateParkingAction())->execute(CreateParkingDTO::fromRequest($request, $user));
    }

    public function update(Parking $parking)
    {
        $parking = (new LeaveParkingAction())->execute($parking);

        return response()->json($parking);
    }
}
