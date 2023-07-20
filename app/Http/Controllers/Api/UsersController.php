<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        User::create($request->all());

        return response()->noContent();
    }
}
