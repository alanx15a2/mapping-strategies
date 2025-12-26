<?php

namespace App\Strategies\FullMapping\Object;

readonly class SaveAccountResponseDto
{
    public function __construct(
        public bool $success,
    ) {
    }
}
