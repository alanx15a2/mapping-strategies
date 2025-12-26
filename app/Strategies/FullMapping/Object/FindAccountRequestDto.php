<?php

namespace App\Strategies\FullMapping\Object;

readonly class FindAccountRequestDto
{
    public function __construct(
        public int $id,
    ) {
    }
}
