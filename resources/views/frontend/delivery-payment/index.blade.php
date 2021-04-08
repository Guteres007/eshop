@extends('frontend.layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Obrázek</th>
                                <th scope="col">Jméno dopravy</th>
                                <th scope="col">Cena</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    <td scope="row"><input type="radio" name="delivery[]"></td>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->price }} {{ config('price.currency') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </form>
            </div>
        </div>
    </div>


@endsection
