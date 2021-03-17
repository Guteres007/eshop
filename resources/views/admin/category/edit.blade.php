@extends('admin.layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header"><strong>Kategorie</strong></div>
                <div class="card-body">
                    <form class="row" action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Jméno kategorie</label>
                                <input class="form-control" name="name" id="name" type="text" value="{{ $category->name }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Popis kategorie</label>
                                <textarea class="form-control" name="description" id="name"
                                    type="text">{{ $category->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Odeslat</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul>

    @endsection
