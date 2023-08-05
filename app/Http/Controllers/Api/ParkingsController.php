<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parking\StoreParkingRequest;
use App\Models\Parking;
use App\Models\User;
use App\Services\Parking\Actions\CreateParkingAction;
use App\Services\Parking\Actions\LeaveParkingAction;
use App\Services\Parking\DTOs\CreateParkingDTO;
use Exception;

class ParkingsController extends Controller
{
    public function index()
    {
    }

    /**
     * @throws Exception
     */
    public function store(StoreParkingRequest $request)
    {
        $user = User::find(1);

        try {
            $park = (new CreateParkingAction())->execute(CreateParkingDTO::fromRequest($request, $user));
            return response()->json($park);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    /**
     * @throws Exception
     */
    public function update(Parking $parking)
    {
        try {
            $parking = (new LeaveParkingAction())->execute($parking);
            return response()->json($parking);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }
}
