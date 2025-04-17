<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оплата</title>
</head>
<body>

<h1>Номер заказа: {{ $payment->payment_id }}</h1>

<form action="{{ route('check-payment', $payment) }}" method="post">
    @csrf

    <input type="text" name="credit_card" id="credit_card" placeholder="Данные карты">
    @error('credit_card') <p>{{ $message }}</p> @enderror
    <button type="submit">Оплатить</button>
</form>

</body>
</html>
