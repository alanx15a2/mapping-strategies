<?php

namespace App\Strategies\NoMapping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(private SendMoneyService $sendMoneyService) {
    }

    public function sendMoney(Request $request) {
        return $this->sendMoneyService->sendMoney(
            $request->fromAccountId,
            $request->toAccountId,
            $request->amount
        )->toArray();
    }
}
