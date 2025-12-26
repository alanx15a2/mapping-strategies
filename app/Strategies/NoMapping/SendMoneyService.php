<?php

namespace App\Strategies\NoMapping;

use App\Strategies\NoMapping\Object\Account;
use Exception;

class SendMoneyService
{
    public function __construct(private AccountRepository $accountRepository) {
    }

    public function sendMoney(int $fromAccountId, int $toAccountId, float $amount): Account {
        if ($amount < 0) {
            throw new Exception('Amount must be greater than 0');
        }

        $fromAccount = $this->accountRepository->find($fromAccountId);
        $toAccount = $this->accountRepository->find($toAccountId);

        $fromAccount->withdraw($amount);
        $toAccount->deposit($amount);

        $this->accountRepository->saveAll([$fromAccount, $toAccount]);

        return $fromAccount;
    }
}
