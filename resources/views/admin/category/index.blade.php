@extends('admin.layouts.admin-layout')

@section('container')
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->id }}
                {{ $category->name }}
                {{ $category->description }}
                {{ $category->slug }}
            </li>
        @endforeach
    </ul>

@endsection
