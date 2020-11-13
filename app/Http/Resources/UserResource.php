<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    public function toArray($request) {

        return [
            'id'         => $this->id,
            'first_name' => $this->type,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'wallet'     => $this->wallet
        ];
    }
}
