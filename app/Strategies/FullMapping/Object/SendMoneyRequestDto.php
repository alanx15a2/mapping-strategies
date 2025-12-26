<?php

namespace App\Strategies\FullMapping\Object;

use Exception;

readonly class SendMoneyRequestDto
{
    public function __construct(
        public int $fromAccountId,
        public int $toAccountId,
        public float $amount,
    ) {
        if ($amount < 0) {
            throw new Exception('Amount must be greater than 0');
        }
    }
}
