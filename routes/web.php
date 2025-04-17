<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/payment/{paymentId}', [PaymentController::class, 'index'])->name('payment');
Route::post('/check-payment/{payment}', [PaymentController::class, 'checkPayment'])->name('check-payment');

Route::get('/success', [PaymentController::class, 'success'])->name('success');
Route::get('/fail', [PaymentController::class, 'fail'])->name('fail');
