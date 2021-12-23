@extends('welcome')

@section('title','documents')
@section('content')
    {{ Breadcrumbs::render('documents') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">Sąskaitos faktūros</h1>
    <div class="row mt-3 mb-5">
        <div class="col-3 col-md-4 col-lg-3">
            <select class="c-select w-100">
                <option value="CURRENT_DAY">Šiandien</option>
                <option value="CURRENT_MONTH" selected="">Šis mėnuo</option>
                <option value="LAST_MONTH">Ankstesnis mėnuo</option>
                <option value="CURRENT_YEAR">Šie metai</option>
                <option value="LAST_YEAR">Ankstesni metai</option>
                <option value="CUSTOM">Nestandartinis diapazonas</option>
            </select>
        </div>
        <div class="mb-5 col-2 credit-limit">
            Kredito limitas: {{$user->limit}}
        </div>
        <div class="mb-5 col-2 credit-limit">
            Liko kredito: {{$user->limit}}
        </div>
        <!-- ko if: viewDate() === 'CUSTOM' --><!-- /ko -->
    </div>

    @if(!isset($orders))
        <div class="text-center my-5 py-5">
        <span class="c-headline mb-2">
          <span>Nieko nerasta.</span>
        </span>
            <span class="c-headline c-headline--sm">
          <span>Nėra dokumentų iš laikotarpio nuo</span>
          <span data-bind="text: currentFrom().format('D MMMM YYYY')">1 rugsėjo 2021</span>
          <span>į</span>
          <span data-bind="text: currentTo().format('D MMMM YYYY')">30 rugsėjo 2021</span>.
        </span>
        </div>
    @else

        <div data-bind="if: ordersLoaded(), attr: { hidden: false }">
            <div class="row d-none d-md-flex pb-2 font-weight-bold">
                <div class="col-2">
                    <span>Užsakymo Nr.</span>
                </div>
                <div class="col">
                    <span>Pirkimo data</span>
                </div>
                <div class="col">
                    <span>Mokėjimo terminas</span>
                </div>
                <div class="col">
                    <span>Liko dienų</span>
                </div>
                <div class="col">
                    <span>Suma be PVM</span>
                </div>
                <div class="col">
                    <span>Suma su PVM</span>
                </div>
                <div class="col">
                    <span>Būsena</span>
                </div>
                <div class="col">
                    <span>Liko apmokėti</span>
                </div>
                <div class="col">
                    <span>Nustatymai</span>
                </div>
            </div>
            <!-- ko foreach: orders() -->
            @foreach($orders as $key => $order)
                <hr class="m-0">
                <div class="row py-2">
                    <div class="col-12 col-md-2">


                        {{--<span class="d-inline-block d-md-none">
                          <span>Zamówienie</span>:
                        </span>--}}
                        <span data-bind="text: id">{{$order->reference}}</span>

                    </div>
                    <div class="col-12 col-md">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{mb_substr($order->created_at,0,10)}}</span>

                    </div>
                    <div class="col-12 col-md">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$user->term}}</span>

                    </div>
                    <div class="col-12 col-md @if($limitDays[$key] > 0) c-product-stock__availability--more @else c-product-stock__availability--less @endif">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$limitDays[$key]}}</span>

                    </div>


                    <div class="col-12 col-md">


  <span class="d-inline-block d-md-none">
    <span>Kaina be PVM</span>:
  </span>
                        <span
                            data-bind="text: totalPrice ? totalPrice.displayNet() + ' ' + totalPrice.currencyCode : '---'">{{round($order->total/1.21,2)}} EUR</span>

                    </div>
                    <div class="col-12 col-md font-weight-bold">


  <span class="d-inline-block d-md-none">
    <span>Kaina su PVM</span>:
  </span>
                        <span
                            data-bind="text: totalPrice ? totalPrice.displayGross() + ' ' + totalPrice.currencyCode : '---'">{{$order->total}} EUR</span>

                    </div>
                    <div class="col-12 col-md">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">Neapmokėta</span>

                    </div>
                    <div class="col-12 col-md">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$order->total}} EUR</span>

                    </div>

                @if(isset($order->document_b1->name))
                    <div class="col-12 col-md">
                        <a target="_blank" href="{{'/'.$order->getFactura()}}" title="Detalės">
                            <span>Sąskaitos faktūrą</span>
                        </a>
                    </div>
                    @else
                        <div class="col-12 col-md">
                            nera
                        </div>
                        @endif
                </div>
            @endforeach

        </div>
    @endif
@endsection
