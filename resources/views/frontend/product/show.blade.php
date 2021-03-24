@extends('frontend.layouts.frontend-layout')

@section('container')

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

@endsection
