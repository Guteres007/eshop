@extends('frontend.layouts.frontend-layout')

@section('container')

    @foreach ($cart_products as $product)
        {{ $product->total_products }} x {{ $product->name }} : {{ $product->total_product_price }}
        {{ config('price.currency') }}
        <form action="{{ route('frontend.cartproduct.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>
    @endforeach
    {{ $total_products_price }} {{ config('price.currency') }}

@endsection
