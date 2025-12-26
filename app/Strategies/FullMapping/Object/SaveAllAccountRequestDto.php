<?php

namespace App\Strategies\FullMapping\Object;

readonly class SaveAllAccountRequestDto
{
    /**
     * @param SaveAccountRequestDto[] $saveAccountRequestDto
     */
    public function __construct(
        public array $saveAccountRequestDto
    ) {
    }
}
