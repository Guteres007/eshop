@extends('frontend.layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Obrázek</th>
                            <th scope="col">Jméno dopravy</th>
                            <th scope="col">Cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">checkbox</td>
                            <td>PPL</td>
                            <th>Price {{ config('price.currency') }}</th>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection
