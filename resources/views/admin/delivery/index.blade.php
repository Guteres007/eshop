@extends('admin.layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Kategorie</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Nadpis dopravy</th>
                                <th>Popis dopravy</th>
                                <th>Cena dopravy</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->name }}</td>
                                    <td> {{ $delivery->description }}</td>
                                    <td> {{ $delivery->price }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.delivery.edit', $delivery->id) }}">Editovat</a>
                                        <form class="d-inline-block" onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.delivery.destroy', $delivery) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm">Odstranit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $deliveries->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
