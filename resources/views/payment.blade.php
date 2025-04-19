@extends('layouts.main')
@section('title', 'Оплата')

@section('content')
    <h1>Номер заказа: {{ $payment->payment_id }}</h1>

    <form action="{{ route('check-payment', $payment) }}" method="post">
        @csrf

        <div class="input-container">
            <label for="credit_card">Банковская карта</label>
            <input type="text" name="credit_card" id="credit_card" placeholder="Данные карты">
            @error('credit_card') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn">Оплатить</button>
    </form>
@endsection
