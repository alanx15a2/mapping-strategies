<?php

namespace App\Strategies\TwoWayMapping;

use App\Strategies\TwoWayMapping\Object\Account;

class SendMoneyService
{
    public function __construct(private AccountRepository $accountRepository) {
    }

    public function sendMoney(int $fromAccountId, int $toAccountId, float $amount): Account {
        $fromAccount = $this->accountRepository->find($fromAccountId);
        $toAccount = $this->accountRepository->find($toAccountId);

        $fromAccount->withdraw($amount);
        $toAccount->deposit($amount);

        $this->accountRepository->saveAll([$fromAccount, $toAccount]);

        return $fromAccount;
    }
}
