<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestmentResource;
use App\Models\Investment;
use App\Models\Strategy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvestmentController extends Controller {

    public function index() {

        return response()->json(
            InvestmentResource::collection(Investment::all())
        );

    }

    public function store(Request $request) {

        $requestArray = $request->only(
            [
                'user_id',
                'strategy_id',
                'amount',
            ]
        );

        $successful = (bool)random_int(0, 1);
        $requestArray['successful'] = $successful;

        $strategy = Strategy::find($requestArray['strategy_id']);
        $multiplier = $successful ?
            $strategy->yield :
            $strategy->relief;
        $requestArray['returns'] = $requestArray['amount'] * $multiplier;
        $investment = Investment::create($requestArray);

        return response()->json(
            new InvestmentResource($investment),
            Response::HTTP_CREATED
        );

    }

    public function show(Investment $investment) {

        return response()->json(
            new InvestmentResource($investment)
        );

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
                'error' => 'You can\'t delete an investment'
            ],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
