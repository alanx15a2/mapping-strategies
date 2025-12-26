<?php

namespace App\Strategies\TwoWayMapping;

use App\Http\Controllers\Controller;
use App\Strategies\TwoWayMapping\Object\AccountResource;
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
