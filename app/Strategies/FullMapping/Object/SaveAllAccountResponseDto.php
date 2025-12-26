<?php

namespace App\Strategies\FullMapping\Object;

readonly class SaveAllAccountResponseDto
{
    public function __construct(
        public int $success,
    ) {
    }
}
