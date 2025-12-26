<?php

namespace App\Strategies\TwoWayMapping\Object;

use Exception;

class Account
{
    public function __construct(
        private readonly int $id,
        private float $amount
    ) {
    }

    public function getId(): int {
        return $this->id;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function withdraw(float $amount): self {
        if ($this->amount < $amount) {
            throw new Exception('Account does not have enough money');
        }

        $this->amount -=$amount;

        return $this;
    }

    public function deposit(float $amount): self {
        if ($this->amount < $amount) {
            throw new Exception('Can\'t deposit below 0');
        }

        $this->amount += $amount;

        return $this;
    }
}
