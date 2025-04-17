<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckPaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PaymentController extends Controller
{
    // Платежная страница
    public function index(string $paymentId): View
    {
        $payment = Payment::where('payment_id', $paymentId)->firstOrFail();

        return view('payment', ['payment' => $payment]);
    }

    /**
     * Проверка платежа
     *
     * @throws ConnectionException
     */
    public function checkPayment(CheckPaymentRequest $request, Payment $payment): RedirectResponse
    {
        if ($request->input('credit_card') !== '8888 0000 0000 1111') {
            return back()->withErrors(['credit_card' => 'Неверная карта']);
        }

        $response = Http::post($payment->webhook_url, [
            'status' => 2,
            'payment_id' => $payment->payment_id,
        ]);

        if (!$response->successful()) {
            return redirect()->route('fail');
        }

        return redirect()->route('success');
    }

    // Успешная оплата
    public function success(): View
    {
        return view('success');
    }

    // Не удалось оплатить
    public function fail(): View
    {
        return view('fail');
    }
}
