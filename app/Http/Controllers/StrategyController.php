<?php

namespace App\Http\Controllers;

use App\Http\Resources\StrategyResource;
use App\Models\Strategy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StrategyController extends Controller {

    public function index() {

        return response()->json(
            StrategyResource::collection(Strategy::all())
        );

    }

    public function store(Request $request) {

        $strategy = Strategy::create($request->all());

        return response()->json(
            new StrategyResource($strategy),
            Response::HTTP_CREATED
        );
    }

    public function show(Strategy $strategy) {

        return response()->json(
            new StrategyResource($strategy)
        );

    }

    public function update(Request $request, Strategy $strategy) {

        $strategy->update(
            $request->only(
                [
                    'type',
                    'tenure',
                    'yield',
                    'relief'
                ]
            )
        );

        return response()->json(
            new StrategyResource($strategy)
        );

    }

    public function destroy(Strategy $strategy) {

        $strategy->delete();

        return response()->json(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
