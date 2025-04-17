<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckPaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'credit_card' => ['required', 'string', 'max:255'],
        ];
    }
}
