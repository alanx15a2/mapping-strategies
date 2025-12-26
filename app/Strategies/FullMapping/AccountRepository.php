<?php

namespace App\Strategies\FullMapping;

use App\Strategies\FullMapping\Object\AccountModel;
use App\Strategies\FullMapping\Object\FindAccountResponseDto;
use App\Strategies\FullMapping\Object\SaveAccountRequestDto;
use App\Strategies\FullMapping\Object\SaveAccountResponseDto;
use App\Strategies\FullMapping\Object\SaveAllAccountRequestDto;
use App\Strategies\FullMapping\Object\SaveAllAccountResponseDto;
use App\Strategies\TwoWayMapping\Object\Account;

class AccountRepository
{
    public function find(int $id): FindAccountResponseDto {
        $accountModel = AccountModel::find($id);

        return new FindAccountResponseDto(
            $accountModel->id,
            $accountModel->amount,
        );
    }

    public function save(SaveAccountRequestDto $request): SaveAccountResponseDto {
        $this->toModel($request)->save();

        return new SaveAccountResponseDto(true);
    }

    public function saveAll(SaveAllAccountRequestDto $request): SaveAllAccountResponseDto {
        foreach ($request->saveAccountRequestDto as $saveAccountRequestDto) {
            $this->save($saveAccountRequestDto);
        }

        return new SaveAllAccountResponseDto(true);
    }

    private function toModel(SaveAccountRequestDto $account): AccountModel {
        $accountModel = AccountModel::firstOrNew(
            ['id' => $account->id],
            ['amount' => $account->amount],
        );

        $accountModel->amount = $account->amount;

        return $accountModel;
    }
}
