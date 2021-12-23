@extends('welcome')

@section('title','Užsakymai')
@section('content')
    {{ Breadcrumbs::render('orders') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">Užsakymai</h1>
    <div class="row mt-3 mb-5">
        <div class="col-12 col-md-4 col-lg-3">
            <select class="c-select w-100" data-bind="
          value: viewDate,
          event: { change: loadOrders.bind($root, $element.value) }">
                <option value="CURRENT_DAY">šiandien</option>
                <option value="CURRENT_MONTH" selected="">Šį mėnesį</option>
                <option value="LAST_MONTH">Ankstesnis mėnuo</option>
                <option value="CURRENT_YEAR">Šiemet</option>
                <option value="LAST_YEAR">Ankstesni metai</option>
                <option value="CUSTOM">Nestandartinis diapazonas</option>
            </select>
        </div>
        <!-- ko if: viewDate() === 'CUSTOM' --><!-- /ko -->
    </div>
    @if(!isset($orders))
    <div>
        <!-- ko if: !orders().length -->
        <div class="text-center my-5 py-5">
        <span class="c-headline mb-2">
          <span>Nieko nerasta.</span>
        </span>
            <span class="c-headline c-headline--sm">
          <span>Nėra užsakymų iš</span>
          <span data-bind="text: currentFrom().format('D MMMM YYYY')">1 rugsėjo 2021</span>
          <span>į</span>
          <span data-bind="text: currentTo().format('D MMMM YYYY')">30 rugsėjo 2021</span>.
        </span>
        </div>
        <!-- /ko -->
        <!-- ko if: orders().length --><!-- /ko -->
    </div>
    @else
        <div data-bind="if: ordersLoaded(), attr: { hidden: false }">
            <div class="row d-none d-md-flex-voy pb-2-voy font-weight-bold-voy">
                <div class="col-2">
                    <span>Užsakymo Nr.</span>
                </div>
                <div class="col">
                    <span>Data</span>
                </div>
                <div class="col">
                    <span>Statusas</span>
                </div>
                <div class="col text-right">
                    <span>be PVM</span>
                </div>
                <div class="col text-right">
                    <span>su PVM</span>
                </div>
                <div class="col text-right">
                    <span>Nustatymai</span>
                </div>
            </div>
            <!-- ko foreach: orders() -->
            @foreach($orders as $order)
            <hr class="m-0">
            <div class="row py-2">
                <div class="col-12 col-md-2">


  {{--<span class="d-inline-block d-md-none">
    <span>Zamówienie</span>:
  </span>--}}
                    <span data-bind="text: id">{{$order->reference}}</span>

                </div>
                <div class="col-12 col-md">


                    <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$order->created_at}}</span>

                </div>
                <div class="col-12 col-md">


                    <span data-bind="text: status.name || ''">{{$order->status->last()->name}}</span>

                </div>
                <div class="col-12 col-md text-right">


  <span class="d-inline-block d-md-none">
    <span>Kaina be PVM</span>:
  </span>
                    <span data-bind="text: totalPrice ? totalPrice.displayNet() + ' ' + totalPrice.currencyCode : '---'">{{round($order->total/1.21,2)}} EUR</span>

                </div>
                <div class="col-12 col-md font-weight-bold text-right">


  <span class="d-inline-block d-md-none">
    <span>Kaina su PVM</span>:
  </span>
                    <span data-bind="text: totalPrice ? totalPrice.displayGross() + ' ' + totalPrice.currencyCode : '---'">{{$order->total}} EUR</span>

                </div>
                <div class="col-12 col-md text-right">
                    <a href="{{route('orders.show', $order->reference)}}" title="Detalės">
                        <span>Detalės</span>
                    </a>
                </div>
            </div>
        @endforeach

        </div>
    @endif

@endsection
