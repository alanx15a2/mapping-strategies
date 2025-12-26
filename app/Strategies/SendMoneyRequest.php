<?php

namespace App\Strategies;

use Illuminate\Foundation\Http\FormRequest;

class SendMoneyRequest extends FormRequest
{
    public function rules(): array {
        return [
            'fromAccountId' => 'required|integer|exists:accounts,id',
            'toAccountId' => 'required|integer|exists:accounts,id',
            'amount' => 'required|decimal:8,2|min:1',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
