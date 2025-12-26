<?php

namespace App\Strategies\FullMapping;

use App\Strategies\FullMapping\Object\FindAccountResponseDto;
use App\Strategies\FullMapping\Object\SaveAccountRequestDto;
use App\Strategies\FullMapping\Object\Account;
use App\Strategies\FullMapping\Object\SaveAllAccountRequestDto;
use App\Strategies\FullMapping\Object\SendMoneyRequestDto;
use App\Strategies\FullMapping\Object\SendMoneyResponseDto;

class SendMoneyService
{
    public function __construct(private AccountRepository $accountRepository) {
    }

    public function sendMoney(SendMoneyRequestDto $request): SendMoneyResponseDto {
        $fromAccountResponse = $this->accountRepository->find($request->fromAccountId);
        $fromAccount = $this->toEntity($fromAccountResponse);

        $toAccountResponse = $this->accountRepository->find($request->toAccountId);
        $toAccount = $this->toEntity($toAccountResponse);

        $fromAccount->withdraw($request->amount);
        $toAccount->deposit($request->amount);

        $this->accountRepository->saveAll(new SaveAllAccountRequestDto([
            $this->toSaveRequestDto($fromAccount),
            $this->toSaveRequestDto($toAccount),
        ]));

        return $this->toResponseDto($fromAccount);
    }

    private function toEntity(FindAccountResponseDto $dto): Account {
        return new Account(
            $dto->id,
            $dto->amount,
        );
    }

    private function toResponseDto(Account $account): SendMoneyResponseDto {
        return new SendMoneyResponseDto(
            $account->getId(),
            $account->getAmount(),
        );
    }

    private function toSaveRequestDto(Account $account): SaveAccountRequestDto {
        return new SaveAccountRequestDto(
            $account->getId(),
            $account->getAmount(),
        );
    }
}
