@extends('frontend.layouts.frontend-layout')

@section('container')

    <ul>
        @foreach ($products as $product)
            <li><a href="{{route('frontend.product.show', $product->slug)}}">{{ $product->name }}</a></li>
        @endforeach
    </ul>

@endsection
