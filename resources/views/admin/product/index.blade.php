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
                                <th>Nadpis kategorie</th>
                                <th>Popis kategorie</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td> {{ $product->description }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.product.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm">Odstranit</button>
                                        </form>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.product.edit', $product->id) }}">Editovat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
