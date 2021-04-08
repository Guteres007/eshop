@extends('admin.layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header"><strong>Doprava</strong></div>
                <div class="card-body">
                    <form class="row" action="{{ route('admin.delivery.update', $delivery->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Jméno dopravy <span
                                        class="color-red">{{ $errors->first('name') }}</span></label>
                                <input class="form-control" name="name" type="text" value="{{ $delivery->name }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Popis dopravy <span
                                        class="color-red">{{ $errors->first('description') }}</span></label>
                                <textarea class="form-control" name="description"
                                    type="text">{{ $delivery->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Cena <span
                                        class="color-red">{{ $errors->first('price') }}</span></label>
                                <input class="form-control" name="price" type="text" value="{{ $delivery->price }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Editovat</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul>

    @endsection
