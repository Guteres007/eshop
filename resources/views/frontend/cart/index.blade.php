@extends('frontend.layouts.frontend-layout')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($cart_products)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Obrázek</th>
                                <th scope="col">Jméno</th>
                                <th scope="col">Počet</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_products as $product)


                                <tr>
                                    <th scope="row"><img style="width: 50px"
                                            src="{{ asset('storage/' . $product->product_image_path) }}"
                                            alt="{{ $product->name }}"></th>

                                    <td>{{ $product->name }}</td>
                                    <th>{{ $product->total_products }} x</th>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <form action="{{ route('frontend.cartproduct.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">Celková cena: {{ $total_products_price }}
                                    {{ config('price.currency') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                @else
                    Prázdný košík
                    <a href="{{ route('frontend.home') }}">Domů</a>
                @endif
            </div>


        </div>
    </div>








@endsection
