<?php

namespace App\Strategies\FullMapping\Object;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
        ];
    }
}
