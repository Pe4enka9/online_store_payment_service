<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LinkRequest;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    // Создание платежа
    public function createLink(LinkRequest $request): JsonResponse
    {
        $paymentId = uniqid('payment_');

        Payment::create([
            'payment_id' => $paymentId,
            'webhook_url' => $request->input('webhook_url'),
        ]);

        return response()->json([
            'payment_id' => $paymentId,
            'pay_url' => url('/payment/' . $paymentId),
        ]);
    }
}
