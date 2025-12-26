<?php

namespace App\Strategies\FullMapping;

use App\Http\Controllers\Controller;
use App\Strategies\FullMapping\Object\SaveAccountRequestDto;
use App\Strategies\FullMapping\Object\AccountResource;
use App\Strategies\FullMapping\Object\SendMoneyRequestDto;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(private SendMoneyService $sendMoneyService) {
    }

    public function sendMoney(Request $request)
    {
        $requestDto = new SendMoneyRequestDto(
            $request->fromAccountId,
            $request->toAccountId,
            $request->amount,
        );

        $sendMoneyResponseDto = $this->sendMoneyService->sendMoney($requestDto);

        return new AccountResource($sendMoneyResponseDto);
    }
}
