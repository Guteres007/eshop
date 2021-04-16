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
                            <li class="breadcrumb-item active" aria-current="page">Košík</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Košík</h1>
                </div>
            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Obrázek</th>
                            <th class="cart-table__column cart-table__column--product">Produkt</th>
                            <th class="cart-table__column cart-table__column--price">Cena</th>
                            <th class="cart-table__column cart-table__column--quantity">Množství</th>
                            <th class="cart-table__column cart-table__column--total">Cena</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">

                        @foreach ($cart_products as $product)
                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <div class="product-image">
                                        <a href="" class="product-image__body">
                                            <img class="product-image__img"
                                                src="{{ asset('storage/' . $product->product_image_path) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="{{ route('frontend.product.show', $product->slug) }}"
                                        class="cart-table__product-name">{{ $product->name }}</a>

                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                    {{ $product->price }} {{ config('price.currency') }}</td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input onchange="return changeProductQuantity(this,  {{ $product->id }})"
                                            class="form-control input-number__input" type="number" min="1"
                                            value="{{ $product->quantity }}" max="10">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">
                                    {{ $product->price * $product->quantity }}
                                    {{ config('price.currency') }}
                                </td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <form action="{{ route('frontend.cartproduct.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                            <svg width="12px" height="12px">
                                                <use xlink:href="/theme-v1/images/sprite.svg#cross-12"></use>
                                            </svg>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="cart__actions">


                    <a href="/" class="btn btn-light">Pokračovat v nákupu</a>
                    <a class="btn btn-primary" href="{{ route('frontend.delivery-payment.index') }}">Doprava a
                        platba</a>

                </div>
                <div class="row justify-content-end pt-5">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Celková cena</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                        <tr>
                                            <th>Cena bez dopravy</th>
                                            <td>{{ $total_products_price }} {{ config('price.currency') }}</td>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                        <tr>
                                            <th>Doprava</th>
                                            <td>
                                                od {{ $delivery_price }} {{ config('price.currency') }}
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                        <tr>
                                            <th>Celková cena</th>
                                            <td>{{ $total_products_price + $delivery_price }}
                                                {{ config('price.currency') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                                    href="{{ route('frontend.delivery-payment.index') }}">Doprava a platba</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->


@endsection
