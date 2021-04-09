@extends('frontend._layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('frontend.delivery-payment.store') }}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Jméno dopravy</th>
                                <th scope="col">Cena</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    <td scope="row"><input type="radio" name="delivery_id[{{ $delivery->id }}]"></td>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->price }} {{ config('price.currency') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <a class="btn" href="{{ route('frontend.cart.index') }}">Zpět</a> <button class="btn btn-success"
                        type="submit">Kontaktní údaje</button>
                </form>
            </div>
        </div>
    </div>


@endsection
