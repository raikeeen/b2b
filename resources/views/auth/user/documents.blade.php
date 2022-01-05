@extends('welcome')

@section('title','documents')
@section('content')
    {{ Breadcrumbs::render('documents') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">Sąskaitos faktūros</h1>
    <div class="row mt-3 mb-5">
        <form action="{{route('documents.index')}}" method="get">
            <div class="c-form-group" style="padding: 0 15px;">
                <input class="credit-limit" type="text" name="dates" value="{{$date[0]}} - {{$date[1]}}">
            </div>
        </form>
        <div class="mb-5 col-2 credit-limit">
            Kredito limitas: {{$user->limit}} EUR
        </div>
        <div class="mb-5 col-2 credit-limit">
            Liko kredito: {{$limitSum}} EUR
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
                <div class="col text-center">
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


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$limitDays[$key][1]}}</span>

                    </div>
                    <div class="col-12 col-md @if($limitDays[$key] > 0) c-product-stock__availability--more @else c-product-stock__availability--less @endif">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$limitDays[$key][0]}}</span>

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
                    <div class="col-12 col-md text-center">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">@if(isset($order->document_b1->status->name))
                                <span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
        white-space: nowrap;background-color:   {{$order->document_b1->status->color}};">{{$order->document_b1->status->name}}</span>
                            @else  <span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
        white-space: nowrap;background-color: #DC143C;"> neapmokėta </span> @endif</span>

                    </div>
                    <div class="col-12 col-md">


                        <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">@if(isset($order->document_b1->price)){{$order->document_b1->price}} EUR @else {{$order->total}} EUR @endif </span>

                    </div>

                @if(isset($order->document_b1->name))
                    <div class="col-12 col-md">
                        <a target="_blank" href="{{'/'.$order->getFactura()}}" title="Detalės">
                            <span>Sąskaita-faktūra</span>
                        </a>
                    </div>
                    @else
                        <div class="col-12 col-md">
                            Nėra
                        </div>
                        @endif
                </div>
            @endforeach

        </div>
    @endif
    <script>
        $('input[name="dates"]').daterangepicker(
        {
            opens: 'left'
        }, function(start, end, label) {
                window.location.href = window.location.origin + window.location.pathname + "?date=" + start.format('YYYY-MM-DD') + ' ' + end.format('YYYY-MM-DD')
        });
    </script>
@endsection
