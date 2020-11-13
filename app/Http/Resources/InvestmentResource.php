<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource {

    public function toArray($request) {

        return [
            'user'       => $this->user,
            'strategy'   => new StrategyResource($this->strategy),
            'successful' => $this->successful,
            'amount'     => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

