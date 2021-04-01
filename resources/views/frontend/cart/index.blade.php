@extends('frontend.layouts.frontend-layout')

@section('container')

    @foreach ($cart_products as $product)
        {{ $product->name }} : {{ $product->total_product_price }} {{ config('price.currency') }}
        <br>
    @endforeach
    {{ $total_products_price }} {{ config('price.currency') }}

@endsection
