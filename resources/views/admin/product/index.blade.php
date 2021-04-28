@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-1">
                             Produkty
                        </div>
                        <div class="col-2">
                            <form action="{{ route('admin.product.index') }}" method="get">

                                    <div class="col-sm-12">
                                        <input type="text" name="search_by_id" class="form-control form-control-sm"
                                            placeholder="podle id">
                                    </div>

                            </form>
                        </div>
                        <div class="col-2">
                            <form action="{{ route('admin.product.index') }}" method="get">

                                    <div class="col-sm-12">
                                        <input type="text" name="search_by_name" class="form-control form-control-sm"
                                            placeholder="podle nadpisu">
                                    </div>


                            </form>
                        </div>

                    </div>




                </div>

                <div class="card-body">


                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th style="width: 30px;">Obrázek</th>
                                <th>Nadpis</th>
                                <th>Cena</th>
                                <th>Množství</th>
                                <th style="width: 30px;">Akce</th>
                                <th style="width: 30px;">Novinka</th>
                                <th style="width: 30px;">Výprodej</th>
                                <th style="width: 30px;">Viditelnost</th>
                                <th style="width: 30px;">Homepage</th>
                                <th style="width: 140px;">Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>

                                        <img style="width: 30px;"
                                            src="{{ asset('storage/' . ($product->images()->first()->path ?? '')) }}"
                                            alt="{{ $product->images()->first()->name ?? '' }}">

                                    </td>
                                    <td><a target="_blank" href="{{route('frontend.product.show', $product->slug)}}">{{ Str::words($product->name, 3, '...') }}</a> </td>
                                    <td>{{ $product->price->price_with_currency() }}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <label class="c-switch c-switch-label c-switch-success">
                                            <input onclick="return productSignal(event)" data-url="{{ route('admin.product-signal.store', ['id' => $product->id, 'signal' => 'action']) }}" class="c-switch-input" type="checkbox" {{$product->action ? 'checked' : ''}}>
                                            <span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="c-switch c-switch-label c-switch-success">
                                            <input onclick="return productSignal(event)" data-url="{{ route('admin.product-signal.store', ['id' => $product->id, 'signal' => 'new']) }}" class="c-switch-input" type="checkbox" {{$product->new ? 'checked' : ''}}>
                                            <span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>

                                    </td>
                                    <td>

                                        <label class="c-switch c-switch-label c-switch-success">
                                            <input onclick="return productSignal(event)" data-url="{{ route('admin.product-signal.store', ['id' => $product->id, 'signal' => 'sale']) }}" class="c-switch-input" type="checkbox" {{$product->sale ? 'checked' : ''}}>
                                            <span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="c-switch c-switch-label c-switch-success">
                                            <input onclick="return productSignal(event)" data-url="{{ route('admin.product-signal.store', ['id' => $product->id, 'signal' => 'active']) }}" class="c-switch-input" type="checkbox" {{$product->active ? 'checked' : ''}}>
                                            <span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="c-switch c-switch-label c-switch-success">
                                            <input onclick="return productSignal(event)" data-url="{{ route('admin.product-signal.store', ['id' => $product->id, 'signal' => 'homepage']) }}" class="c-switch-input" type="checkbox" {{$product->homepage ? 'checked' : ''}}>
                                            <span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
                                        </label>
                                    </td>
                                    <td>

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.product.edit', $product->id) }}"> <i class="cil-pen c-icon"></i></a>
                                        <form class="d-inline-block" onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.product.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="c-icon cil-ban"></i></button>
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
