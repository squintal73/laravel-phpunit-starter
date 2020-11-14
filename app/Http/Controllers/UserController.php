<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller {

    public function index() {

        return response()->json(
            UserResource::collection(User::all())
        );

    }

    public function store(Request $request) {

        $user = User::create(
            [
                'first_name' => $request->get('first_name'),
                'last_name'  => $request->get('last_name')
            ]
        );
        Wallet::create(
            [
                'balance' => 100,
                'user_id' => $user->id
            ]
        );

        return response()->json(
            new UserResource($user),
            Response::HTTP_CREATED
        );
    }

    public function show(User $user) {

        return response()->json(
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

        return response()->json(
            new UserResource($user)
        );
    }

    public function destroy(User $user) {

        $user->delete();

        return response()->json(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
