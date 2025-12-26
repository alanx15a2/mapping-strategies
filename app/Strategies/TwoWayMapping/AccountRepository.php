<?php

namespace App\Strategies\TwoWayMapping;

use App\Strategies\TwoWayMapping\Object\Account;
use App\Strategies\TwoWayMapping\Object\AccountModel;

class AccountRepository
{
    public function find(int $id): Account {
        $accountModel = AccountModel::find($id);
        return $this->toEntity($accountModel);
    }

    public function save(Account $account): bool {
        return $this->toModel($account)->save();
    }

    public function saveAll(array $accounts): bool {
        foreach ($accounts as $account) {
            $this->save($account);
        }

        return true;
    }

    private function toEntity(AccountModel $account): Account {
        return new Account(
            $account->id,
            $account->amount,
        );
    }

    private function toModel(Account $account): AccountModel {
        $accountModel = AccountModel::firstOrNew(
            ['id' => $account->getId()],
            ['amount' => $account->getAmount()],
        );

        $accountModel->amount = $account->getAmount();

        return $accountModel;
    }
}
