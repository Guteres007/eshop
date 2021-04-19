@extends('frontend._layouts.frontend-layout')

@section('container')
    <!-- site__body -->
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
                            <li class="breadcrumb-item active" aria-current="page">Souhrn</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
        <form class="checkout block" action="{{ route('frontend.order.store') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                            <div class="card-body">
                                <h3 class="card-title">Kontaktní údaje</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-first-name">Jméno</label>
                                        <input type="text" class="form-control" id="checkout-first-name" placeholder="Jméno"
                                            name="first_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Přijmení</label>
                                        <input type="text" class="form-control" id="checkout-last-name"
                                            placeholder="Přijmení" name="second_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="checkout-street-address">Ulice a čp</label>
                                    <input type="text" class="form-control" id="checkout-street-address"
                                        placeholder="Ulice a čp" name="street">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-city">Město</label>
                                        <input type="text" class="form-control" id="checkout-city" name="city">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-postcode">PSČ</label>
                                        <input type="text" class="form-control" id="checkout-postcode" name="postcode">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-email">E-mail</label>
                                        <input type="email" class="form-control" id="checkout-email" placeholder="E-mail"
                                            name="emial">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Telefon</label>
                                        <input type="text" class="form-control" id="checkout-phone" placeholder="Telefon"
                                            name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="checkout-comment">Komentář<span class="text-muted">
                                            (volitelný)</span></label>
                                    <textarea id="checkout-comment" class="form-control" name="comment" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Objednávka</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Produkt</th>
                                            <th>Cena</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                        @foreach ($cart_products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->quantity }}x
                                                    {{ $product->price->price_with_currency() }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Doručení: {{ $delivery_payment_data['delivery_name'] }}</th>
                                            <td>{{ \App\Helpers\PriceHelper::format_price_with_currency($delivery_payment_data['delivery_price']) }}
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Platba: {{ $delivery_payment_data['payment_name'] }}</th>
                                            <td>{{ \App\Helpers\PriceHelper::format_price_with_currency($delivery_payment_data['payment_price']) }}
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Konečná cena</th>
                                            <td>{{ \App\Helpers\PriceHelper::format_price_with_currency($total_products_price->raw() + $delivery_payment_data['payment_price'] + $delivery_payment_data['delivery_price']) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="checkout__agree form-group">
                                    <div class="form-check">
                                        <span class="form-check-input input-check">
                                            <span class="input-check__body">
                                                <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                <span class="input-check__box"></span>
                                                <svg class="input-check__icon" width="9px" height="7px">
                                                    <use xlink:href="/theme-v1/images/sprite.svg#check-9x7"></use>
                                                </svg>
                                            </span>
                                        </span>
                                        <label class="form-check-label" for="checkout-terms">
                                            Souhlas s <a target="_blank" href="{{ route('frontend.terms-conditions') }}">
                                                obchodními podmínkami.</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-xl btn-block">Odeslat objednávku</button>
                                <a class="btn btn-secondary btn-xl btn-block"
                                    href="{{ route('frontend.delivery-payment.index') }}"> Zpět </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- site__body / end -->

@endsection
