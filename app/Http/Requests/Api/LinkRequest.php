<?php

namespace App\Http\Requests\Api;

class LinkRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'price' => ['required', 'numeric'],
            'webhook_url' => ['required', 'url'],
        ];
    }
}
