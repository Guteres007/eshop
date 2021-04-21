@extends('frontend._layouts.frontend-layout')

@section('container')

    <div class="site__body">
        <!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--full block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="block-slideshow__body">
                            <div class="owl-carousel">
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('/theme-v1/images/slides/slide-1-full.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('/theme-v1/images/slides/slide-1-mobile.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Výprodej zásob</div>
                                        <div class="block-slideshow__slide-text">Do konce měsíce platí pro všechny produkty
                                            sleva -30%.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Koupit</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('/theme-v1/images/slides/slide-2-full.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('/theme-v1/images/slides/slide-2-mobile.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('/theme-v1/images/slides/slide-3-full.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('/theme-v1/images/slides/slide-3-mobile.jpg')">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-slideshow / end -->
        <!-- .block-features -->
        <div class="block block-features block-features--layout--boxed">
            <div class="container">
                <div class="block-features__list">
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="/theme-v1/images/sprite.svg#fi-free-delivery-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Doprava zdarma</div>
                            <div class="block-features__subtitle">od 1500 Kč</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>

                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="/theme-v1/images/sprite.svg#fi-payment-security-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">100% Bezpečný nákup</div>
                            <div class="block-features__subtitle">zabezpečená platba</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="/theme-v1/images/sprite.svg#fi-tag-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Super slevy</div>
                            <div class="block-features__subtitle">slevy až -40%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-features / end -->
        <!-- .block-products -->
        <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Akční zboží</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-products__body">
                    @php
                        $product = $homepage_products[0];
                    @endphp
                    <a href="{{ route('frontend.product.show', $product->slug) }}" class="block-products__featured">
                        <div class="block-products__featured-item">
                            <div class="product-card product-card--hidden-actions ">
                                <div class="product-card__badges-list">
                                    @if ($product->new)
                                        <div class="product-card__badge product-card__badge--new">Novinka
                                        </div>
                                    @endif
                                    @if ($product->action)
                                        <div class="product-card__badge product-card__badge--hot">Akce</div>
                                    @endif
                                    @if ($product->sale)
                                        <div class="product-card__badge product-card__badge--sale">Výprodej
                                        </div>
                                    @endif
                                </div>
                                <div class="product-card__image product-image">
                                    <span class="product-image__body">
                                        <img class="product-image__img"
                                            src="{{ asset(
    'storage/' .
        ($product->images()->orderby('rank', 'asc')->first()->path ??
            ''),
) }}"
                                            alt="{{ $product->images()->orderby('rank', 'asc')->first()->name ?? '' }}">
                                    </span>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <span>{{ $product->name }}</span>
                                    </div>


                                </div>
                                <div class="product-card__actions">

                                    <div class="product-card__prices">
                                        {{ $product->price->price_with_currency() }}
                                    </div>
                                    <div class="product-card__buttons">
                                        <span class="btn btn-primary product-card__addtocart" type="button">Detail</span>
                                        <span
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">Detail</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    <div class="block-products__list">
                        @for ($i = 1; $i < $homepage_products->count(); $i++)

                            @php
                                $product = $homepage_products[$i];
                            @endphp

                            <a href="{{ route('frontend.product.show', $product->slug) }}"
                                class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">

                                    <div class="product-card__badges-list">
                                        @if ($product->new)
                                            <div class="product-card__badge product-card__badge--new">Novinka
                                            </div>
                                        @endif
                                        @if ($product->action)
                                            <div class="product-card__badge product-card__badge--hot">Akce</div>
                                        @endif
                                        @if ($product->sale)
                                            <div class="product-card__badge product-card__badge--sale">Výprodej
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-card__image product-image">
                                        <span class="product-image__body">
                                            <img class="product-image__img"
                                                src="{{ asset(
    'storage/' .
        ($product->images()->orderby('rank', 'asc')->first()->path ??
            ''),
) }}"
                                                alt="{{ $product->images()->orderby('rank', 'asc')->first()->name ?? '' }}">
                                        </span>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <span>{{ $product->name }}</span>
                                        </div>
                                    </div>
                                    <div class="product-card__actions">

                                        <div class="product-card__prices">
                                            {{ $product->price->price_with_currency() }}
                                        </div>
                                        <div class="product-card__buttons">
                                            <span class="btn btn-primary product-card__addtocart">Detail</span>
                                            <span
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list">Detail</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-products / end -->
    @endsection
