<?php

namespace App\Http\Controllers\Api;

use App\Actions\Parking\CreateParkingAction;
use App\DTOs\Parking\CreateParkingDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Parking\StoreParkingRequest;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;

class ParkingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingRequest $request)
    {
        $user = User::find(1);
        (new CreateParkingAction())->execute(CreateParkingDTO::fromRequest($request, $user));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
