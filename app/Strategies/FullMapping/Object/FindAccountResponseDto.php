<?php

namespace App\Strategies\FullMapping\Object;

readonly class FindAccountResponseDto
{
    public function __construct(
        public int $id,
        public float $amount,
    ) {
    }
}
