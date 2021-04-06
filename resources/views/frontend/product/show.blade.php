@extends('frontend.layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="pt-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Domů</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $product->categories()->first()->name }}
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12">
                    <ul>
                        <li>{{ $product->name }}</li>
                        <li>{{ $product->price }}</li>
                        <li>{{ $product->description }}</li>
                    </ul>

                    <form action="{{ route('frontend.cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="count" value="1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit">
                            Koupit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
