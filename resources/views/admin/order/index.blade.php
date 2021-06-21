@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Objednávky</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Kód a datum</th>
                                <th>Jméno a přijmení</th>
                                <th>Doprava</th>
                                <th>Platba</th>

                                <th>Stav</th>
                                <th>Cena</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)


                                <tr>

                                    <td>
                                        <div>#{{ $order->uniq_id }}</div>
                                        <div class="small text-muted"> {{ $order->created_at->format('d. m. Y') }}
                                        </div>
                                    </td>

                                    <td>

                                        {{ $order->first_name }} {{ $order->last_name }}
                                    </td>
                                    <td>
                                        {{ $order->delivery_name }}
                                    </td>
                                    <td>
                                        {{ $order->payment_name }}
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="return change(this, {{$order->id}})">
                                            @if ($order->order_status->status_id === 4)
                                                <option value="4" selected>Stornována</option>
                                                @else
                                                <option value="4">Stornována</option>
                                            @endif
                                            @if ($order->order_status->status_id === 3)
                                                <option value="3" selected >Nevyřízena</option>
                                                @else
                                                <option value="3" >Nevyřízena</option>
                                            @endif
                                            @if ($order->order_status->status_id === 2)
                                                <option value="2" selected>Vyřizuje se</option>
                                                @else
                                                <option value="2">Vyřizuje se</option>
                                            @endif
                                            @if ($order->order_status->status_id === 1)
                                                <option value="1" selected>Vyřízena</option>
                                                @else
                                                <option value="1">Vyřízena</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        @php
                                            $total_price = 0;
                                            foreach ($order->order_items as $item) {
                                                $total_price += $item->price->raw() * $item->quantity;
                                            }
                                        @endphp

                                        {{ \App\Helpers\PriceHelper::format_price_with_currency($total_price + $order->delivery_price + $order->payment_price) }}

                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#"> <i class="cil-print c-icon"></i></a>
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.order.show', $order->id)}}"> <i class="cil-basket c-icon"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() ?? '' }}
                </div>

            </div>
        </div>
    </div>



@endsection
