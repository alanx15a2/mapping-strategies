<?php

namespace App\Strategies\OneWayMapping\Object;

interface AccountState
{
    public function getId(): int;

    public function getAmount(): float;
}
