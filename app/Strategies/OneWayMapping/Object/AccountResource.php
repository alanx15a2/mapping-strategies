<?php

namespace App\Strategies\OneWayMapping\Object;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    public function toArray(Request $request): array {
        return [
            'id' => $this->getId(),
            'amount' => $this->getAmount(),
        ];
    }
}
