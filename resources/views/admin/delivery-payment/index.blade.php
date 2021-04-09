@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Párování dopravy a platby</div>
                <form class="card-body" method="POST" action="{{ route('admin.delivery-payment.store') }}">
                    @csrf
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                            <tr>
                                @foreach ($deliveries as $delivery)
                                    <th>{{ $delivery->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    @foreach ($deliveries as $delivery)

                                        @if ($payment->deliveries->find($delivery->id))
                                            <td>
                                                <label for="">{{ $payment->name }}
                                                    <input type="checkbox"
                                                        name="delivery_payment[{{ $delivery->id }}][{{ $payment->id }}][active]"
                                                        {{ $payment->deliveries->find($delivery->id)->pivot->active ? 'checked' : '' }}>
                                                    <input type="text" class="form-control" placeholder="Cena"
                                                        name="delivery_payment[{{ $delivery->id }}][{{ $payment->id }}][price]"
                                                        value="{{ $payment->deliveries->find($delivery->id)->pivot->price }}">
                                            </td>
                                        @else
                                            <td>
                                                <label for="">{{ $payment->name }}
                                                    <input type="checkbox"
                                                        name="delivery_payment[{{ $delivery->id }}][{{ $payment->id }}][active]">
                                                    <input type="text" class="form-control" placeholder="Cena"
                                                        name="delivery_payment[{{ $delivery->id }}][{{ $payment->id }}][price]">
                                            </td>
                                        @endif

                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success" type="submit">Povrdit</button>
                </form>
            </div>
        </div>
    </div>



@endsection
