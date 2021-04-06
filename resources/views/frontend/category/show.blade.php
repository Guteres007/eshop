@extends('frontend.layouts.frontend-layout')

@section('container')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="pt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Domů</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
            @foreach ($products as $product)
                <div class="col-3">
                    <a href="{{ route('frontend.product.show', $product->slug) }}" class="card">
                        <img class="card-img-top"
                            src="{{ asset('storage/' . ($product->images()->first()->path ?? '')) }}"
                            alt="{{ $product->images()->first()->name ?? '' }}">

                        <div class="card-body">
                            <p class="card-title">
                                {{ $product->name }}
                            </p>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <p class="card-text">
                                {{ $product->price }} {{ config('price.currency') }}
                            </p>
                            <span class="btn btn-success">
                                Detail
                            </span>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>

@endsection
