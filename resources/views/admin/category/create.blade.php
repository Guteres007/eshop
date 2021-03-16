@extends('admin.layouts.admin-layout')

@section('container')

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nadpis">
        <br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <button type="submit">
            Odeslat
        </button>
    </form>

@endsection
