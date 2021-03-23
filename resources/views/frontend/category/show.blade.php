@extends('frontend.layouts.frontend-layout')

@section('container')

    <ul>
        @foreach ($products as $product)
            <li> {{ $product->name }}</li>
        @endforeach
    </ul>

@endsection
