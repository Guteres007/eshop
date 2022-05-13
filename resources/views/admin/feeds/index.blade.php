@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Feedy</strong></div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-3">
                            <p class="font-3xl font-weight-bold">
                                Google
                            </p>
                            <br>
                            <a class="btn btn-success" href="{{route('admin.feed.generate', 'google')}}">Vygenerovat feed</a>
                        </div>
                        <div class="col-3">
                            <p class="font-3xl font-weight-bold">
                                Heureka
                            </p>
                            <br>
                            <a class="btn btn-success" href="{{route('admin.feed.generate', 'heureka')}}">Vygenerovat feed</a>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
    <ul>

    @endsection
