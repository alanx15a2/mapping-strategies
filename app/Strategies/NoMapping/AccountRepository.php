<?php

namespace App\Strategies\NoMapping;

use App\Strategies\NoMapping\Object\Account;

class AccountRepository
{
    public function find(int $id): Account {
        return Account::find($id);
    }

    public function save(Account $account): bool {
        return $account->save();
    }

    public function saveAll(array $accounts): bool {
        foreach ($accounts as $account) {
            $this->save($account);
        }

        return true;
    }
}
