@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Feedy</strong></div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('admin.feed.generate', 'google')}}">Google</a>
                        </div>
                        <div class="col-12">
                            <a href="{{route('admin.feed.generate', 'heureka')}}">Heureka</a>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
    <ul>

    @endsection
