@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Objednávka #{{$order->id}}</strong></div>
                <div class="card-body">


                    <form class="row" action="{{ route('admin.product.store') }}" autocomplete="off" method="POST"
                        enctype="multipart/form-data" id="order_form">
                        @csrf
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="nav-tabs-boxed">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Základní informace</a></li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <div class="card">
                                                    <div class="card-header">
                                                        Kontakt na zákazníka
                                                    </div>
                                                    <div class="card-body">

                                                    <ul class="list-unstyled">
                                                        <li>{{$order->first_name}} {{$order->last_name}}</li>
                                                        <li>{{$order->street}}, {{$order->city}}, {{$order->postcode}}</li>
                                                        <li>{{$order->email}}</li>
                                                        <li>{{$order->phone}}</li>
                                                    </ul>
                                                    </div>
                                                  </div>
                                            </div>


                                            <div class="col-sm-4">

                                                <div class="card">
                                                    <div class="card-header">
                                                        Fakturační adresa
                                                    </div>
                                                    <div class="card-body">

                                                    <ul class="list-unstyled">
                                                        <li>{{$order->first_name}} {{$order->last_name}}</li>
                                                        <li>{{$order->street}}, {{$order->city}}, {{$order->postcode}}</li>
                                                        <li>{{$order->email}}</li>
                                                        <li>{{$order->phone}}</li>
                                                    </ul>
                                                    </div>
                                                  </div>
                                            </div>


                                            <div class="col-sm-4">

                                                <div class="card">
                                                    <div class="card-header">
                                                        Doručovací adresa
                                                    </div>
                                                    <div class="card-body">

                                                    <ul class="list-unstyled">
                                                        <li>{{$order->first_name}} {{$order->last_name}}</li>
                                                        <li>{{$order->street}}, {{$order->city}}, {{$order->postcode}}</li>
                                                        <li>{{$order->email}}</li>
                                                        <li>{{$order->phone}}</li>
                                                    </ul>
                                                    </div>
                                                  </div>
                                            </div>



                                            <div class="col-sm-12">
                                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Kód</th>
                                                            <th style="width: 66px;"></th>
                                                            <th>Název</th>
                                                            <th>Mn.</th>
                                                            <th>Cena za kus</th>
                                                            <th>Cena</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->order_items as $item)

                                                            <tr>

                                                                <td>
                                                                    <div>#{{ $item->product_id }}</div>

                                                                </td>
                                                                <td>
                                                                    <img style="width: 60px;"
                                                                    src="{{ asset('storage/' . ($item->product->images()->first()->path ?? '')) }}"
                                                                    alt="{{ $item->product->images()->first()->name ?? '' }}">
                                                                </td>

                                                                <td>

                                                                   <a href="{{route('admin.product.edit', $item->product->id)}}"> {{ $item->name }}</a>
                                                                </td>


                                                                <td>
                                                                    {{$item->quantity }}


                                                                </td>

                                                                <td>{{$item->price->price_with_currency()}}</td>

                                                                <td>
                                                                    @php
                                                                    $total_price = 0;
                                                                    foreach ($order->order_items as $item) {
                                                                        $total_price += $item->price->raw() * $item->quantity;
                                                                    }
                                                                @endphp

                                                                {{ \App\Helpers\PriceHelper::format_price_with_currency($total_price) }}
                                                                </td>


                                                            </tr>

                                                        @endforeach



                                                      <tr>
                                                        <td></td>
                                                        <td></td>
                                                      <td>{{$order->payment_name}}</td>

                                                      <td>1</td>
                                                      <td>{{\App\Helpers\PriceHelper::format_price_with_currency($order->payment_price)}}</td>
                                                      <td>{{\App\Helpers\PriceHelper::format_price_with_currency($order->payment_price)}}</td>
                                                    </tr>

                                                      <tr>
                                                          <td></td>
                                                          <td></td>
                                                        <td>{{$order->delivery_name}}</td>

                                                        <td>1</td>
                                                        <td>{{\App\Helpers\PriceHelper::format_price_with_currency($order->delivery_price)}}</td>
                                                        <td>{{\App\Helpers\PriceHelper::format_price_with_currency($order->delivery_price)}}</td>
                                                      </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6" class="text-right">Částka k úhradě: <strong>{{ \App\Helpers\PriceHelper::format_price_with_currency($total_price + $order->delivery_price + $order->payment_price) }}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>



                                            @if ($order->comment)
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Vzkaz od zákazníka
                                                    </div>
                                                    <div class="card-body">

                                                 <p class="card-text">
                                                     {{$order->comment}}
                                                 </p>
                                                    </div>
                                                  </div>
                                            </div>

                                            @endif



                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </div>
        </div>
    </div>
    <ul>

    @endsection
