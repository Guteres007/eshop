 @extends('frontend._layouts.frontend-layout')

 @section('container')


     <!-- site__body -->
     <div class="site__body">
         <div class="block order-success">
             <div class="container">
                 <div class="order-success__body">
                     <div class="order-success__header">
                         <svg class="order-success__icon" width="100" height="100">
                             <use xlink:href="/theme-v1/images/sprite.svg#check-100"></use>
                         </svg>
                         <h1 class="order-success__title">Děkujeme</h1>
                         <div class="order-success__subtitle">Vaše objednávka se nyní zpracovává.</div>
                         <div class="order-success__actions">
                             <a href="{{ route('frontend.homepage') }}" class="btn btn-xs btn-secondary">Zpět na
                                 homepage</a>
                         </div>
                     </div>
                     <div class="order-success__meta">
                         <ul class="order-success__meta-list">
                             <li class="order-success__meta-item">
                                 <span class="order-success__meta-title">Číslo objednávky:</span>
                                 <span class="order-success__meta-value">#{{ $order->uniq_id }}</span>
                             </li>
                             <li class="order-success__meta-item">
                                 <span class="order-success__meta-title">Vytvořeno:</span>
                                 <span class="order-success__meta-value">{{ $order->created_at }}</span>
                             </li>
                             <li class="order-success__meta-item">
                                 <span class="order-success__meta-title">Celková cena:</span>
                                 <span class="order-success__meta-value">{{ $order_total_price }}</span>
                             </li>
                             <li class="order-success__meta-item">
                                 <span class="order-success__meta-title">Platba</span>
                                 <span class="order-success__meta-value">{{ $order->payment_name }}</span>
                             </li>
                         </ul>
                     </div>
                     <div class="card">
                         <div class="order-list">
                             <table>
                                 <thead class="order-list__header">
                                     <tr>
                                         <th class="order-list__column-label" colspan="2">Produkty</th>
                                         <th class="order-list__column-quantity">Množství</th>
                                         <th class="order-list__column-total">Cena</th>
                                     </tr>
                                 </thead>
                                 <tbody class="order-list__products">

                                     @foreach ($order_items as $item)


                                         <tr>
                                             <td class="order-list__column-image">
                                                 <div class="product-image">
                                                     <a href="{{ route('frontend.product.show', $item->product_slug) }}"
                                                         class="product-image__body">

                                                         <img class="product-image__img"
                                                             src="{{ asset('storage/' . ($item->image_path ?? '')) }}"
                                                             alt="{{ $item->name }}">
                                                     </a>
                                                 </div>
                                             </td>
                                             <td class="order-list__column-product">
                                                 <a
                                                     href="{{ route('frontend.product.show', $item->product_slug) }}">{{ $item->name }}</a>

                                             </td>
                                             <td class="order-list__column-quantity" data-title="Qty:">
                                                 {{ $item->quantity }}
                                             </td>
                                             <td class="order-list__column-total">
                                                 {{ \App\Helpers\PriceHelper::format_price_with_currency($item->price) }}
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                                 <tbody class="order-list__subtotals">
                                     <tr>
                                         <th class="order-list__column-label" colspan="3">Doprava a platba</th>
                                         <td class="order-list__column-total">{{ $delivery_payment_price }}</td>
                                     </tr>

                                 </tbody>
                                 <tfoot class="order-list__footer">
                                     <tr>
                                         <th class="order-list__column-label" colspan="3">Celková cena</th>
                                         <td class="order-list__column-total">{{ $order_total_price }}</td>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                     </div>
                     <div class="row mt-3 no-gutters mx-n2">
                         <div class="col-sm-6 col-12 px-2">
                             <div class="card address-card">
                                 <div class="address-card__body">
                                     <div class="address-card__badge address-card__badge--muted">Doručovací adresa</div>
                                     <div class="address-card__name">{{ $order->first_name }}</div>
                                     <div class="address-card__row">
                                         {{ $order->street }}<br>
                                         {{ $order->postcode }}, {{ $order->city }}<br>
                                     </div>
                                     <div class="address-card__row">
                                         <div class="address-card__row-title">Telefon</div>
                                         <div class="address-card__row-content">{{ $order->phone }}</div>
                                     </div>
                                     <div class="address-card__row">
                                         <div class="address-card__row-title">Email</div>
                                         <div class="address-card__row-content">{{ $order->email }}</div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                             <div class="card address-card">
                                 <div class="address-card__body">
                                     <div class="address-card__badge address-card__badge--muted">Fakturační adresa</div>
                                     <div class="address-card__name">{{ $order->first_name }}</div>
                                     <div class="address-card__row">
                                         {{ $order->street }}<br>
                                         {{ $order->postcode }}, {{ $order->city }}<br>
                                     </div>
                                     <div class="address-card__row">
                                         <div class="address-card__row-title">Telefon</div>
                                         <div class="address-card__row-content">{{ $order->phone }}</div>
                                     </div>
                                     <div class="address-card__row">
                                         <div class="address-card__row-title">Email</div>
                                         <div class="address-card__row-content">{{ $order->email }}</div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- site__body / end -->

 @endsection
