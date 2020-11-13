<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource {

    public function toArray($request) {

        return [
            'id'         => $this->id,
            'user_id'       => $this->user->id,
            'strategy_id'   => $this->strategy->id,
            'successful' => $this->successful === 1,
            'amount'     => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
