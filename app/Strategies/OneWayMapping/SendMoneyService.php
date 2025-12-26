<?php

namespace App\Strategies\OneWayMapping;

use App\Strategies\OneWayMapping\Object\Account;
use App\Strategies\OneWayMapping\Object\AccountState;
use Exception;

class SendMoneyService
{
    public function __construct(private AccountRepository $accountRepository) {
    }

    public function sendMoney(int $fromAccountId, int $toAccountId, float $amount): AccountState {
        if ($amount < 0) {
            throw new Exception('Amount must be greater than 0');
        }
        $fromAccountState = $this->accountRepository->find($fromAccountId);
        $fromAccount = $this->toEntity($fromAccountState);

        $toAccountState = $this->accountRepository->find($toAccountId);
        $toAccount = $this->toEntity($toAccountState);

        $fromAccount->withdraw($amount);
        $toAccount->deposit($amount);

        $this->accountRepository->saveAll([$fromAccount, $toAccount]);

        return $fromAccount;
    }

    private function toEntity(AccountState $accountState): Account {
        return new Account(
            $accountState->getId(),
            $accountState->getAmount(),
        );
    }
}
