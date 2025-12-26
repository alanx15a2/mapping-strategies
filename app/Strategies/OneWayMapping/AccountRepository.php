<?php

namespace App\Strategies\OneWayMapping;

use App\Strategies\OneWayMapping\Object\AccountModel;
use App\Strategies\OneWayMapping\Object\AccountState;

class AccountRepository
{
    public function find(int $id): AccountState {
        return AccountModel::find($id);
    }

    public function save(AccountState $account): bool {
        return $this->toModel($account)->save();
    }

    /**
     * @param AccountState[] $accounts
     *
     * @return bool
     */
    public function saveAll(array $accounts): bool {
        foreach ($accounts as $account) {
            $this->save($account);
        }

        return true;
    }

    private function toModel(AccountState $account): AccountModel {
        $accountModel = AccountModel::firstOrNew(
            ['id' => $account->getId()],
            ['amount' => $account->getAmount()],
        );

        $accountModel->amount = $account->getAmount();

        return $accountModel;
    }
}
