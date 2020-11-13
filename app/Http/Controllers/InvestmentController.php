<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestmentResource;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvestmentController extends Controller {

    public function index() {

        return InvestmentResource::collection(Investment::all());
    }

    public function store(Request $request) {

        $requestArray = $request->only(
            [
                'user_id',
                'strategy_id',
                'amount',
            ]
        );
        $requestArray['successful'] = (bool)random_int(0, 1);

        $investment = Investment::create($requestArray);

        return response()->json(
            new InvestmentResource($investment),
            Response::HTTP_CREATED
        );

    }

    public function show(Investment $investment) {

        return new InvestmentResource($investment);
    }

    public function update() {

        return response()->json(
            [
                'error' => 'You can\'t update an investment'
            ],
            Response::HTTP_UNAUTHORIZED
        );
    }

    public function destroy() {

        return response()->json(
            [
                'error' => 'You can\'t delet an investment'
            ],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
