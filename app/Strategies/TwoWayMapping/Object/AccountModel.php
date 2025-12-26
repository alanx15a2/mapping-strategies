<?php

namespace App\Strategies\TwoWayMapping\Object;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'amount',
        'id',
    ];

    public function getId(): int {
        return $this->id;
    }

    public function getAmount(): float {
        return $this->amount;
    }
}
