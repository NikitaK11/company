<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <title>Success Order</title>
</head>
<body>
<h3>Ваш Заказ успешно оформлен</h3>
<p>Номер заказа : {{$order->id}}</p>
<p>Мероприятие : {{$order->event->title}}</p>
<p>Дата : {{$order->event->date_begin_event}}</p>
<p>Количесвто билетов : {{$order->quantity}}</p>
<p>Стоимость билета : {{$order->event->price}} BYN</p>
<p>Сумма : {{$order->quantity * $order->event->price}} BYN</p>
<p>Тип оплаты : {{$order->payment->type->name}}</p>
</body>
</html>
