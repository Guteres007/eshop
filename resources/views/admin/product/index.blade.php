@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Produkty</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <form action="{{ route('admin.product.index') }}" method="get">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" name="search_by_id" class="form-control form-control-sm"
                                            placeholder="podle id">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <form action="{{ route('admin.product.index') }}" method="get">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" name="search_by_name" class="form-control form-control-sm"
                                            placeholder="podle nadpisu">
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>




                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Obrázek</th>
                                <th>Nadpis</th>
                                <th>Cena</th>
                                <th>Akce</th>
                                <th>Novinka</th>
                                <th>Výprodej</th>
                                <th>Viditelnost</th>
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
                                    <td> {{ $product->price->price_with_currency() }}</td>
                                    <td> <a class="btn btn-success btn-sm" href="">Ano dodělat</a></td>
                                    <td><a class="btn btn-success btn-sm" href="">Ano</a></td>
                                    <td><a class="btn btn-success btn-sm" href="">Ano</a></td>
                                    <td>
                                        @if ($product->active)
                                            <a class="btn btn-success btn-sm" href=""><i
                                                    class="cil-check-circle c-icon"></i></a>
                                        @else
                                            <a class="btn btn-danger btn-sm" href=""><i class="cil-ban c-icon"></i></a>
                                        @endif

                                    </td>
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
