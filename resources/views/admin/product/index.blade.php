@extends('admin.layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Produkty</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Obrázek</th>
                                <th>Nadpis</th>
                                <th>Cena</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>

                                        <img style="width: 70px;"
                                            src="{{ asset('storage/' . ($product->images()->first()->path ?? '')) }}"
                                            alt="{{ $product->images()->first()->name ?? '' }}">

                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td> {{ $product->price }} {{ config('price.currency') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.product.edit', $product->id) }}">Editovat</a>
                                        <form class="d-inline-block" onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.product.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm">Odstranit</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() ?? '' }}
                </div>
            </div>
        </div>
    </div>



@endsection
