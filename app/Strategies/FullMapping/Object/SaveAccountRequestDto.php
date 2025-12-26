<?php

namespace App\Strategies\FullMapping\Object;

readonly class SaveAccountRequestDto
{
    public function __construct(
        public int $id,
        public float $amount,
    ) {
    }
}
