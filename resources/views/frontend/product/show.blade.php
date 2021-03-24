@extends('frontend.layouts.frontend-layout')

@section('container')

    <ul>
        <li>{{ $product->name }}</li>
        <li>{{ $product->price }}</li>
        <li>{{ $product->description }}</li>
    </ul>

    <form action="">
        @csrf
        <input type="hidden" value="1">
        <button type="submit">
            Koupit
        </button>
    </form>

@endsection
