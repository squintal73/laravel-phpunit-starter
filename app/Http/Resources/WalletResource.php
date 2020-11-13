<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource {

    public function toArray($request) {

        return [
            'balance'      => $this->type,
            'last_updated' => (string)$this->updated_at,
        ];
    }
}
