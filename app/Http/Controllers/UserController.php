<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {

        return $this->successResponse(
            UserResource::collection(User::all())
        );

    }

    public function store(Request $request) {

        $user = User::create(
            [
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email'  => $request->get('email')
            ]
        );
        Wallet::create(
            [
                'balance' => 100,
                'user_id' => $user->id
            ]
        );

        return $this->successResponse(
            new UserResource($user),
            true
        );
    }

    public function show(User $user) {

        return $this->successResponse(
            new UserResource($user)
        );

    }

    public function update(Request $request, User $user) {

        $user->update(
            $request->only(
                [
                    'first_name',
                    'last_name'
                ]
            )
        );

        return $this->successResponse(
            new UserResource($user)
        );
    }

    public function destroy(User $user) {

        $user->delete();

        return $this->deleteResponse();
    }
}
