<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Objednávka</title>
</head>
<body>




    <ul class="order-success__meta-list">
        <li class="order-success__meta-item">
            <span class="order-success__meta-title">Číslo objednávky:</span>
            <span class="order-success__meta-value">#{{ $order->id }}</span>
        </li>
        <li class="order-success__meta-item">
            <span class="order-success__meta-title">Vytvořeno:</span>
            <span class="order-success__meta-value">{{ $order->created_at }}</span>
        </li>
        <li class="order-success__meta-item">
            <span class="order-success__meta-title">Celková cena:</span>
            <span class="order-success__meta-value">{{ $order_total_price }}</span>
        </li>
        <li class="order-success__meta-item">
            <span class="order-success__meta-title">Platba</span>
            <span class="order-success__meta-value">{{ $order->payment_name }}</span>
        </li>
    </ul>



    <table style="width: 100%;">
        <thead class="order-list__header">
            <tr>
                <th class="order-list__column-label" colspan="2">Produkty</th>
                <th class="order-list__column-quantity">Množství</th>
                <th class="order-list__column-total">Cena</th>
            </tr>
        </thead>
        <tbody class="order-list__products">

            @foreach ($order_items as $item)


                <tr>
                    <td style="width: 100px;">
                        <div style="width: 100px;">
                            <a href="{{ route('frontend.product.show', $item->product_slug) }}"
                                class="product-image__body">

                                <img style="width: 100px;"
                                    src="{{ asset('storage/' . ($item->image_path ?? '')) }}"
                                    alt="{{ $item->name }}">
                            </a>
                        </div>
                    </td>
                    <td class="order-list__column-product">
                        <a
                            href="{{ route('frontend.product.show', $item->product_slug) }}">{{ $item->name }}</a>

                    </td>
                    <td class="order-list__column-quantity" data-title="Qty:">
                        {{ $item->quantity }}
                    </td>
                    <td class="order-list__column-total">
                        {{ \App\Helpers\PriceHelper::format_price_with_currency($item->price) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tbody class="order-list__subtotals">
            <tr>
                <th class="order-list__column-label" colspan="3">Doprava a platba</th>
                <td class="order-list__column-total">{{ $delivery_payment_price }}</td>
            </tr>

        </tbody>
        <tfoot class="order-list__footer">
            <tr>
                <th class="order-list__column-label" colspan="3">Celková cena</th>
                <td class="order-list__column-total">{{ $order_total_price }}</td>
            </tr>
        </tfoot>
    </table>


    <div>Doručovací adresa</div>
                                <div>{{ $order->first_name }}</div>
                                <div>
                                    {{ $order->street }}<br>
                                    {{ $order->postcode }}, {{ $order->city }}<br>
                                </div>
                                <div>
                                    <div>Telefon</div>
                                    <div>{{ $order->phone }}</div>
                                </div>
                                <div>
                                    <div>Email</div>
                                    <div>{{ $order->email }}</div>
                                </div>


                                <div>
                                    <div>Fakturační adresa</div>
                                    <div>{{ $order->first_name }}</div>
                                    <div>
                                        {{ $order->street }}<br>
                                        {{ $order->postcode }}, {{ $order->city }}<br>
                                    </div>
                                    <div>
                                        <div>Telefon</div>
                                        <div>{{ $order->phone }}</div>
                                    </div>
                                    <div>
                                        <div>Email</div>
                                        <div>{{ $order->email }}</div>
                                    </div>
                                </div>



</body>
</html>
