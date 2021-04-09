@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header"><strong>Platba</strong></div>
                <div class="card-body">
                    <form class="row" action="{{ route('admin.payment.store') }}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Jméno platby <span
                                        class="color-red">{{ $errors->first('name') }}</span></label>
                                <input class="form-control" name="name" type="text">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Popis platby <span
                                        class="color-red">{{ $errors->first('description') }}</span></label>
                                <textarea class="form-control" name="description" type="text"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Vytvořit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul>

    @endsection
