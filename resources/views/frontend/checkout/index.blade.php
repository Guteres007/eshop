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
                            <li class="breadcrumb-item active" aria-current="page">Objednávka</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Objednávka</h1>
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
                                        <label for="checkout-first-name">Jméno
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->first('first_name') ? 'is-invalid' : '' }}"
                                            id="checkout-first-name" placeholder="Jméno" name="first_name"
                                            value="{{ old('first_name') }}">
                                        @if ($errors->first('first_name'))
                                            <div class="invalid-feedback"> {{ $errors->first('first_name') }}</div>
                                        @endif

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Přijmení</label>
                                        <input type="text"
                                            class="form-control {{ $errors->first('last_name') ? 'is-invalid' : '' }}"
                                            id="checkout-last-name" placeholder="Přijmení" name="last_name"
                                            value="{{ old('last_name') }}">
                                        @if ($errors->first('last_name'))
                                            <div class="invalid-feedback"> {{ $errors->first('last_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="checkout-street-address">Ulice a čp</label>
                                    <input type="text"
                                        class="form-control {{ $errors->first('street') ? 'is-invalid' : '' }}"
                                        id="checkout-street-address" placeholder="Ulice a čp" name="street"
                                        value="{{ old('street') }}">

                                    @if ($errors->first('street'))
                                        <div class="invalid-feedback"> {{ $errors->first('street') }}</div>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-city">Město</label>
                                        <input type="text"
                                            class="form-control {{ $errors->first('city') ? 'is-invalid' : '' }}"
                                            id="checkout-city" name="city" value="{{ old('city') }}">

                                        @if ($errors->first('city'))
                                            <div class="invalid-feedback"> {{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-postcode">PSČ</label>
                                        <input type="text"
                                            class="form-control  {{ $errors->first('postcode') ? 'is-invalid' : '' }}"
                                            id="checkout-postcode" name="postcode" value="{{ old('postcode') }}">
                                        @if ($errors->first('postcode'))
                                            <div class="invalid-feedback"> {{ $errors->first('postcode') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-email">E-mail</label>
                                        <input type="email"
                                            class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                            id="checkout-email" placeholder="E-mail" name="email"
                                            value="{{ old('email') }}">

                                        @if ($errors->first('email'))
                                            <div class="invalid-feedback"> {{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Telefon</label>
                                        <input type="text"
                                            class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
                                            id="checkout-phone" placeholder="Telefon ve formátu 123456789" name="phone"
                                            value="{{ old('phone') }}">

                                        @if ($errors->first('phone'))
                                            <div class="invalid-feedback"> {{ $errors->first('phone') }}</div>
                                        @endif
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
                                                <input class="input-check__input" type="checkbox" name="terms" value="1"
                                                    id="checkout-terms">
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

                                        @if ($errors->first('terms'))
                                            <div class="text-danger"> {{ $errors->first('terms') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-xl btn-block"
                                    onclick="this.disabled=true;this.innerHTML='Odesílám...';this.form.submit();">
                                    Odeslat objednávku
                                </button>

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
