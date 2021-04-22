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
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">
                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                        <div class="block-sidebar__backdrop"></div>
                        <div class="block-sidebar__body">
                            <div class="block-sidebar__header">
                                <div class="block-sidebar__title">Filters</div>
                                <button class="block-sidebar__close" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/theme-v1/images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse
                                    data-collapse-opened-class="filter--opened">
                                    <h4 class="widget-filters__title widget__title">Filtrace</h4>
                                    <div class="widget-filters__list">

                                        <div class="widget-filters__item">
                                            <div class="filter" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Kategorie
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-categories-alt">

                                                            <ul class="filter-categories-alt__list filter-categories-alt__list--level--1"
                                                                data-collapse-opened-class="filter-categories-alt__item--open">

                                                                @foreach ($cartegories as $category)
                                                                    <li class="filter-categories-alt__item"
                                                                        data-collapse-item>
                                                                        <a
                                                                            href="{{ route('frontend.category.show', $category->slug) }}">{{ $category->name }}</a>
                                                                    </li>
                                                                    @if (false)

                                                                        <li class="filter-categories-alt__item"
                                                                            data-collapse-item>
                                                                            <button class="filter-categories-alt__expander"
                                                                                data-collapse-trigger></button>
                                                                            <a href="">Power Tools</a>
                                                                            <div class="filter-categories-alt__children"
                                                                                data-collapse-content>
                                                                                <ul
                                                                                    class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                                                                    <li class="filter-categories-alt__item"
                                                                                        data-collapse-item>
                                                                                        <a href="">Engravers</a>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Cena
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>

                                                    <div class="filter__container">

                                                        <div class="filter-price" data-min="{{ (int) $price_min }}"
                                                            data-max="{{ (int) $price_max }}"
                                                            data-from="{{ (int) request()->query('price-from') > 0 ? (int) request()->query('price-from') : (int) $price_min }}"
                                                            data-to="{{ (int) request()->query('price-to') > 0 ? (int) request()->query('price-to') : (int) $price_max }}">

                                                            <div class="filter-price__slider"></div>
                                                            <div class="filter-price__title">Cena: <span
                                                                    class="filter-price__min-value"></span> Kč – <span
                                                                    class="filter-price__max-value"></span> Kč</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Brand
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list">
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Wakita
                                                                    </span>
                                                                    <span class="filter-list__counter">7</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" checked>
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Zosch
                                                                    </span>
                                                                    <span class="filter-list__counter">42</span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" checked disabled>
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        WeVALT
                                                                    </span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" disabled>
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Hammer
                                                                    </span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Mitasia
                                                                    </span>
                                                                    <span class="filter-list__counter">1</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-check">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <svg class="input-check__icon" width="9px"
                                                                                height="7px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-9x7">
                                                                                </use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Metaggo
                                                                    </span>
                                                                    <span class="filter-list__counter">25</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Brand
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list">
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Wakita
                                                                    </span>
                                                                    <span class="filter-list__counter">7</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Zosch
                                                                    </span>
                                                                    <span class="filter-list__counter">42</span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio" checked
                                                                                disabled>
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        WeVALT
                                                                    </span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio" disabled>
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Hammer
                                                                    </span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Mitasia
                                                                    </span>
                                                                    <span class="filter-list__counter">1</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Metaggo
                                                                    </span>
                                                                    <span class="filter-list__counter">25</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Color
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-down-12x7">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-color">
                                                            <div class="filter-color__list">
                                                                <label class="filter-color__item">
                                                                    <span
                                                                        class="filter-color__check input-check-color  input-check-color--white  "
                                                                        style="color: #fff;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span
                                                                        class="filter-color__check input-check-color   input-check-color--light "
                                                                        style="color: #d9d9d9;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #b3b3b3;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #808080;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #666;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #4d4d4d;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #262626;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #ff4040;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox" checked>
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #ff8126;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span
                                                                        class="filter-color__check input-check-color   input-check-color--light "
                                                                        style="color: #ffd440;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span
                                                                        class="filter-color__check input-check-color   input-check-color--light "
                                                                        style="color: #becc1f;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #8fcc14;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox" checked>
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #47cc5e;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #47cca0;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #47cccc;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #40bfff;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox" disabled>
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #3d6dcc;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox" checked>
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #7766cc;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #b852cc;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                                <label class="filter-color__item">
                                                                    <span class="filter-color__check input-check-color  "
                                                                        style="color: #e53981;">
                                                                        <label class="input-check-color__body">
                                                                            <input class="input-check-color__input"
                                                                                type="checkbox">
                                                                            <span class="input-check-color__box"></span>
                                                                            <svg class="input-check-color__icon"
                                                                                width="12px" height="9px">
                                                                                <use
                                                                                    xlink:href="/theme-v1/images/sprite.svg#check-12x9">
                                                                                </use>
                                                                            </svg>
                                                                            <span class="input-check-color__stick"></span>
                                                                        </label>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-filters__actions d-flex">
                                        <button class="btn btn-primary btn-sm">Filter</button>
                                        <button class="btn btn-secondary btn-sm">Reset</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options view-options--offcanvas--mobile">
                                    <div class="view-options__filters-button">
                                        <button type="button" class="filters-button">
                                            <svg class="filters-button__icon" width="16px" height="16px">
                                                <use xlink:href="/theme-v1/images/sprite.svg#filters-16"></use>
                                            </svg>
                                            <span class="filters-button__title">Filters</span>
                                            <span class="filters-button__counter">3</span>
                                        </button>
                                    </div>
                                    <div class="view-options__layout">
                                        <div class="layout-switcher">
                                            <div class="layout-switcher__list">
                                                <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid"
                                                    type="button"
                                                    class="layout-switcher__button  layout-switcher__button--active ">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="/theme-v1/images/sprite.svg#layout-grid-16x16">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <button data-layout="grid-3-sidebar" data-with-features="true"
                                                    title="Grid With Features" type="button"
                                                    class="layout-switcher__button ">
                                                    <svg width="16px" height="16px">
                                                        <use
                                                            xlink:href="/theme-v1/images/sprite.svg#layout-grid-with-details-16x16">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <button data-layout="list" data-with-features="false" title="List"
                                                    type="button" class="layout-switcher__button ">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="/theme-v1/images/sprite.svg#layout-list-16x16">
                                                        </use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="view-options__divider"></div>
                                    <div class="view-options__control">
                                        <label for="">Řadit podle</label>
                                        <div>
                                            <select class="form-control form-control-sm" name="" id="">
                                                <option value="">Výchozí</option>
                                                <option value="">Nejprodávanejší</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                                data-with-features="false" data-mobile-grid-columns="2">
                                <div class="products-list__body">

                                    @foreach ($products as $product)

                                        <!-- list -->
                                        <a href="{{ route('frontend.product.show', $product->slug) }}"
                                            class="products-list__item">
                                            <div class="product-card product-card--hidden-actions">

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
                                                    <div class="product-card__rating" style="display: none;">
                                                        <div class="product-card__rating-stars">
                                                            <div class="rating">
                                                                <div class="rating__body">
                                                                    <svg class="rating__star rating__star--active"
                                                                        width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                    <svg class="rating__star rating__star--active"
                                                                        width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                    <svg class="rating__star rating__star--active"
                                                                        width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                    <svg class="rating__star rating__star--active"
                                                                        width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div
                                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                    <svg class="rating__star " width="13px" height="12px">
                                                                        <g class="rating__fill">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal">
                                                                            </use>
                                                                        </g>
                                                                        <g class="rating__stroke">
                                                                            <use
                                                                                xlink:href="/theme-v1/images/sprite.svg#star-normal-stroke">
                                                                            </use>
                                                                        </g>
                                                                    </svg>
                                                                    <div class="rating__star rating__star--only-edge ">
                                                                        <div class="rating__fill">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                        <div class="rating__stroke">
                                                                            <div class="fake-svg-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__rating-legend">9 Reviews</div>
                                                    </div>
                                                    <div class="product-card__features-list">
                                                        {{ $product->description }}
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__prices">
                                                        {{ $product->price->price_with_currency() }}

                                                    </div>
                                                    <div class="product-card__buttons">
                                                        <span class="btn btn-primary product-card__addtocart">Detail</span>

                                                        <span
                                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                            type="button">Detail</span>


                                                        <!--
                                                                                                                                                                                                                                                                                                                                                                                                <button
                                                                                                                                                                                                                                                                                                                                                                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                                                                                                                                                                                                                                                                                                                                                                    type="button">
                                                                                                                                                                                                                                                                                                                                                                                                    <svg width="16px" height="16px">
                                                                                                                                                                                                                                                                                                                                                                                                        <use xlink:href="/theme-v1/images/sprite.svg#wishlist-16">
                                                                                                                                                                                                                                                                                                                                                                                                        </use>
                                                                                                                                                                                                                                                                                                                                                                                                    </svg>
                                                                                                                                                                                                                                                                                                                                                                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                                <button
                                                                                                                                                                                                                                                                                                                                                                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                                                                                                                                                                                                                                                                                                                                                                    type="button">
                                                                                                                                                                                                                                                                                                                                                                                                    <svg width="16px" height="16px">
                                                                                                                                                                                                                                                                                                                                                                                                        <use xlink:href="/theme-v1/images/sprite.svg#compare-16">
                                                                                                                                                                                                                                                                                                                                                                                                        </use>
                                                                                                                                                                                                                                                                                                                                                                                                    </svg>
                                                                                                                                                                                                                                                                                                                                                                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                                                                                                                                                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                                                                                                                                                                                         -->
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- list end -->
                                    @endforeach
                                </div>
                            </div>
                            <div class="products-view__pagination">
                                {{ $products->links('frontend._vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
@endsection
