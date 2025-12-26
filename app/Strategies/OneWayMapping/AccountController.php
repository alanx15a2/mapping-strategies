<?php

namespace App\Strategies\OneWayMapping;

use App\Http\Controllers\Controller;
use App\Strategies\OneWayMapping\Object\AccountResource;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(private SendMoneyService $sendMoneyService) {
    }

    public function sendMoney(Request $request)
    {
        $accountEntity = $this->sendMoneyService->sendMoney(
            $request->fromAccountId,
            $request->toAccountId,
            $request->amount
        );

        return new AccountResource($accountEntity);
    }
}
