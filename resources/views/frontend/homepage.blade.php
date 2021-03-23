@extends('frontend.layouts.frontend-layout')

@section('container')

    <ul>
        @foreach ($categories as $category)
            <li> <a href="{{ route('frontend.category.show', $category->slug) }}"> {{ $category->name }} </a></li>
        @endforeach
    </ul>

@endsection
