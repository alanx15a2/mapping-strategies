<?php

namespace App\Strategies\FullMapping\Object;

readonly class SendMoneyResponseDto
{
    public function __construct(
        public int $id,
        public float $amount,
    ) {
    }
}
