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
                                <th>Nadpis platby</th>
                                <th>Popis platby</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->name }}</td>
                                    <td> {{ $payment->description }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.payment.edit', $payment->id) }}">Editovat</a>
                                        <form class="d-inline-block" onsubmit="return confirm('Určitě smazat?');"
                                            action="{{ route('admin.payment.destroy', $payment) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm">Odstranit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
