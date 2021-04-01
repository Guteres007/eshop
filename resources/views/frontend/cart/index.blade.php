@extends('frontend.layouts.frontend-layout')

@section('container')

    @forelse ($cart_products as $product)
        <img style="width: 50px" src="{{ asset('storage/' . $product->product_image_path) }}" alt="ss">
        {{ $product->total_products }} x {{ $product->price }}
        {{ $product->name }}
        :
        {{ $product->total_product_price }}
        {{ config('price.currency') }}
        <form action="{{ route('frontend.cartproduct.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>

    @empty
        Prázdný košík
        <a href="{{ route('frontend.home') }}">Domů</a>
    @endforelse


    {{ $total_products_price }} {{ config('price.currency') }}


@endsection
