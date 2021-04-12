@extends('frontend._layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('frontend.delivery-payment.store') }}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Jméno dopravy</th>
                                <th scope="col">Cena</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr onclick="return getPayments({{ $delivery->id }})">
                                    <td scope="row"><input type="radio" name="delivery_id" value="{{ $delivery->id }}">
                                    </td>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->price }} {{ config('price.currency') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <table class="table" id="payments" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Jméno platby</th>
                                <th scope="col">Cena</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr class="payment" data-payment-id="{{ $payment->id }}"">
                                                        <td scope=" row"><input type="radio" name="payment_id"
                                        value="{{ $payment->id }}"></td>
                                    <td class="payment-name">{{ $payment->name }}</td>
                                    <td class="payment-price">{{ $payment->price }} {{ config('price.currency') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <a class="btn" href="{{ route('frontend.cart.index') }}">Zpět</a> <button class="btn btn-success"
                        type="submit">Kontaktní údaje</button>
                </form>
            </div>
        </div>
    </div>


@endsection
