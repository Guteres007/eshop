@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Nastavení</strong></div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <form class="row" action="{{ route('admin.settings.store') }}" autocomplete="off" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Název obchodu <span
                                            class="color-red"></span></label>
                                    <input class="form-control" name="key[store_name]" value="{{$settings[0]->value}}" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Ulice a město <span
                                            class="color-red"></span></label>
                                    <input class="form-control" name="key[store_street]" value="{{$settings[1]->value}}" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Telefon <span
                                            class="color-red"></span></label>
                                    <input class="form-control" name="key[phone]" value="{{$settings[2]->value}}" type="text">
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
        </div>
    </div>
    <ul>

    @endsection
