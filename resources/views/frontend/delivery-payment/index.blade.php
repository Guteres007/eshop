@extends('frontend._layouts.frontend-layout')

@section('container')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Domů</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Doprava a platba</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Doprava a platba</h1>
                </div>
            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <div class="col-12 col-sm-8 offset-sm-2">
                    <form action="{{ route('frontend.delivery-payment.store') }}" method="POST">
                        @csrf

                        <div class="payment-methods">
                            <h4 class="card-title">
                                Doprava
                            </h4>
                            <ul class="payment-methods__list">

                                @foreach ($deliveries as $delivery)
                                    <li class="payment-methods__item"
                                        onclick="return getPayments(this, {{ $delivery->id }})">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="delivery_id"
                                                        value="{{ $delivery->id }}" type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">
                                                <span class="delivery-name">{{ $delivery->name }} </span>
                                                <span class="delivery-price ml-4">{{ $delivery->price }}
                                                    {{ config('price.currency') }}</span>
                                            </span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted">
                                                {{ $delivery->description }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>


                            <ul class="payment-methods__list mt-4" id="payments" style="display: none;">
                                <h4 class="card-title">
                                    Platba
                                </h4>
                                @foreach ($payments as $payment)
                                    <li class="payment-methods__item payment" data-payment-id="{{ $payment->id }}">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="payment_id"
                                                        value="{{ $payment->id }}" type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">
                                                <span class="payment-name">{{ $payment->name }} </span>
                                                <span class="payment-price ml-4">{{ $payment->price }}
                                                    {{ config('price.currency') }}</span>
                                            </span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-description text-muted ">
                                                {{ $payment->description }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="cart__actions">


                            <a href="{{ route('frontend.cart.index') }}"" class=" btn btn-light">Zpět</a>
                            <button class="btn btn-primary" type="submit">Kontaktní údaje</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
