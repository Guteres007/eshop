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
                            <li class="breadcrumb-item">
                                <a
                                    href="{{ route('frontend.category.show', $product->categories()->first()->slug) }}">{{ $product->categories()->first()->name }}</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="product product--layout--standard" data-layout="standard">
                    <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <button class="product-gallery__zoom">
                                        <svg width="24px" height="24px">
                                            <use xlink:href="/theme-v1/images/sprite.svg#zoom-in-24"></use>
                                        </svg>
                                    </button>
                                    <div class="owl-carousel" id="product-image">
                                        @foreach ($product->images()->orderBy('rank', 'asc')->get()
        as $image)
                                            <div class="product-image product-image--location--gallery">
                                                <a href="{{ asset('storage/' . ($image->path ?? '')) }}" data-width="700"
                                                    data-height="700" class="product-image__body" target="_blank">
                                                    <img class="product-image__img product-gallery__carousel-image"
                                                        src="{{ asset('storage/' . ($image->path ?? '')) }}"
                                                        alt="{{ $image->name }}">
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">

                                        @foreach ($product->images()->orderBy('rank', 'asc')->get()
        as $image)
                                            <a href="{{ asset('storage/' . ($image->path ?? '')) }}"
                                                class="product-image product-gallery__carousel-item">
                                                <div class="product-image__body">
                                                    <img class="product-image__img product-gallery__carousel-image"
                                                        src="{{ asset('storage/' . ($image->path ?? '')) }}"
                                                        alt="{{ $image->name }}">
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .product__gallery / end -->


                        <!-- .product__info -->
                        <div class="product__info">
                            <div class="product__wishlist-compare">
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                    data-placement="right" title="Wishlist">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/theme-v1/images/sprite.svg#wishlist-16"></use>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                    data-placement="right" title="Compare">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="/theme-v1/images/sprite.svg#compare-16"></use>
                                    </svg>
                                </button>
                            </div>
                            <h1 class="product__name">{{ $product->name }}</h1>

                            <div class="product__description">
                                {{ $product->short_description }}
                            </div>

                            <ul class="product__meta">
                                <li class="product__meta-availability">Dostupnost:
                                    @if ($product->quantity > 0)
                                        <span class="text-success">Dostupný</span>
                                    @else
                                        <span class="text-danger">Nedostupný</span>
                                    @endif
                                </li>

                                <li>EAN: {{ $product->ean }}</li>
                            </ul>
                        </div>
                        <!-- .product__info / end -->
                        <!-- .product__sidebar -->
                        <div class="product__sidebar">
                            <div class="product__availability">
                                Dostupnost:
                                @if ($product->quantity > 0)
                                    <span class="text-success">Dostupný</span>
                                @else
                                    <span class="text-danger">Nedostupný</span>
                                @endif
                            </div>
                            @if ($product->quantity > 0)
                                <div class="product__prices">
                                    {{ $product->price->formated() }}
                                    {{ config('price.currency') }}
                                </div>
                            @endif

                            @if ($product->quantity > 0)
                                <form class="product__options" action="{{ route('frontend.cart.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group product__option">
                                        <label class="product__option-label" for="product-quantity">Počet</label>
                                        <div class="product__actions">
                                            <div class="product__actions-item">
                                                <div class="input-number product__quantity">
                                                    <input id="product-quantity"
                                                        class="input-number__input form-control form-control-lg"
                                                        type="number" min="1" value="1" name="quantity">
                                                    <div class="input-number__add"></div>
                                                    <div class="input-number__sub"></div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <div class="product__actions-item product__actions-item--addtocart">
                                                <button type="submit" class="btn btn-primary btn-lg">Koupit</button>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                            @endif
                            <!-- .product__options / end -->
                        </div>

                    </div>
                </div>
                <div class="product-tabs  product-tabs--sticky">
                    <div class="product-tabs__list">
                        <div class="product-tabs__list-body">
                            <div class="product-tabs__list-container container">
                                <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Popis</a>
                                <a href="#tab-specification" class="product-tabs__item">Specifikace</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                            <div class="typography">
                                {{ $product->long_description ?? $product->description }}
                            </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-specification">
                            <div class="spec">
                                <h3 class="spec__header">Specifikace</h3>
                                <div class="spec__section">
                                    <h4 class="spec__section-title">Parametry</h4>
                                    @foreach ($product->parameters as $parameter)
                                        <div class="spec__row">
                                            <div class="spec__name">{{ $parameter->name }}</div>
                                            <div class="spec__value">{{ $parameter->value }}</div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->

@endsection
