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

            {{--<span class="c-headline c-headline--sm">
        <span>Užsakymai laikotarpiui nuo</span>
        <span data-bind="text: currentFrom().format('D MMMM YYYY')">1 rugsėjo 2021</span>
        <span>į</span>
        <span data-bind="text: currentTo().format('D MMMM YYYY')">30 rugsėjo 2021</span>.
      </span>--}}
            <div class="row d-none d-md-flex pb-2 font-weight-bold">
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

           {{-- <div class="modal fade" tabindex="-1" data-bind="attr: { id: 'order_' +$index() }" id="order_0" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="c-headline m-0" id="exampleModalLabel">
                                <span>Užsakymas</span><span data-bind="text: id">U000083/2021/000003</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- ko if: !$root.orderItemsLoaded() --><!-- /ko -->
                            <div data-bind="if: $root.orderItemsLoaded(), attr: { hidden: false }">
                                <div class="row justify-content-between mb-5">
                                    <div class="col-12 col-md-5">
                                        <div class="d-flex justify-content-between py-1">
                <span>
                  <span>Užsakymo data</span>:
                </span>
                                            <strong data-bind="text: date.format('D MMMM YYYY, HH:mm')">24 rugsėjo 2021, 15:14</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-1">
                <span>
                  <span>Statusas</span>:
                </span>
                                            <strong data-bind="text: (status.name) ? status.name : '' ">Uždarytas</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-1">
                <span>
                  <span>Dokumento tipas</span>:
                </span>
                                            <strong class="" data-bind="text: documentType.name">Faktūra</strong>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="d-flex justify-content-between py-1">
                <span>
                  <span>Mokėjimo būsena</span>:
                </span>
                                            <strong data-bind="text: paymentInformation.status.name">Netaikoma</strong>
                                        </div>
                                        <!-- ko if: comment --><!-- /ko -->
                                    </div>
                                </div>


                                <div class="row d-none d-md-flex font-weight-bold text-nowrap">
                                    <div class="col-12 col-md-2 py-2">
                                        <span>Kodas</span>
                                    </div>
                                    <div class="col-12 col-md py-2">
                                        <span>Pavadinimas</span>
                                    </div>
                                    <div class="col-12 col-md-1 py-2 text-center">
                                        <span>Kiekis</span>
                                    </div>
                                    <div class="col-12 col-md-2 py-2 text-right">
                                        <span>Grynoji vertė</span>
                                    </div>
                                    <div class="col-12 col-md-2 py-2 text-right">
                                        <span>Bendroji vertė</span>
                                    </div>
                                </div>
                                <!-- ko foreach: items -->
                                <hr class="m-0">
                                <div class="row py-2" data-bind="if: metadata.article">
                                    <div class="col-12 col-sm-3 col-md-2 order-1 order-md-1">
                                        <span data-bind="text: metadata.article.displayCode">A02002D</span>
                                    </div>
                                    <div class="col-12 col-md order-2 order-md-2">
                                        <a class="font-weight-bold" href="/amortizatoriaus-atraminis-guolis--a02002d" data-bind="text: metadata.article.name, attr: { href: metadata.article.url }">AMORTIZATORIAUS ATRAMINIS GUOLIS</a>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-1 order-3 order-md-3 text-center">
                                        <span data-bind="text: quantity() + ' ' + metadata.article.quantityInformation.unit">1 vnt</span>
                                    </div>
                                    <div class="col-12 col-md-2 order-6 order-md-5 text-right">
    <span class="d-inline-block d-md-none">
      <span>Grynoji kaina</span>:
    </span>
                                        <span data-bind="text: priceSummary.displayNet() + ' ' + price.currencyCode">1,82 EUR</span>
                                        <small class="d-block text-muted">
                                            <span data-bind="text: price.displayNet() + ' ' + price.currencyCode + '/' + metadata.article.quantityInformation.unit">1,82 EUR/vnt</span>
                                        </small>
                                    </div>
                                    <div class="col-12 col-md-2 order-7 order-md-6 font-weight-bold text-right">
    <span class="d-inline-block d-md-none">
      <span>Bendra kaina</span>:
    </span>
                                        <span data-bind="text: priceSummary.displayGross() + ' ' + price.currencyCode">2,20 EUR</span>
                                        <small class="d-block text-muted">
                                            <span data-bind="text: price.displayGross() + ' ' + price.currencyCode + '/' + metadata.article.quantityInformation.unit">2,20 EUR/vnt</span>
                                        </small>
                                    </div>
                                </div>

                                <!-- /ko -->

                                <hr class="m-0">
                                <div class="row py-2">
                                    <div class="col-12 col-md font-weight-bold d-none d-md-block">
                                        <span>Iš viso produktų</span>:
                                    </div>
                                    <div class="col-12 col-md"></div>
                                    <div class="col-12 col-sm-2 col-md-1"></div>
                                    <div class="col-12 col-md-2 text-right">
              <span class="d-inline-block d-md-none">
                <span>Suma be PVM</span>:
              </span>
                                        <span data-bind="text: itemsPrice ? itemsPrice.displayNet() + ' ' + itemsPrice.currencyCode : '---'">1,82 EUR</span>
                                    </div>
                                    <div class="col-12 col-md-2 text-right font-weight-bold">
              <span class="d-inline-block d-md-none">
                <span>Suma su PVM</span>:
              </span>
                                        <span data-bind="text: itemsPrice ? itemsPrice.displayGross() + ' ' + itemsPrice.currencyCode : '---'">2,20 EUR</span>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row">
                                    <div class="col-12 col-sm-3 col-md-2 d-none d-md-block">
                                        <span>Transportas:</span>
                                    </div>
                                    <div class="col-12 col-md">
                                        <strong data-bind="text: orderDeliveryTransport.name">Atsiimsiu pats</strong>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-1"></div>
                                    <div class="col-12 col-md-2 text-right">
                                        <span data-bind="text: orderDeliveryTransport.price.displayNet() + ' ' + orderDeliveryTransport.price.currencyCode">0,00 EUR</span>
                                    </div>
                                    <div class="col-12 col-md-2 text-right font-weight-bold">
                                        <span data-bind="text: orderDeliveryTransport.price.displayGross() + ' ' + orderDeliveryTransport.price.currencyCode">0,00 EUR</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-3 col-md-2 d-none d-md-block">
                                        <span>Apmokėjimas:</span>
                                    </div>
                                    <div class="col-12 col-md">
                                        <strong data-bind="text: orderDeliveryPayment.name">Pervedimas į banką</strong>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-1"></div>
                                    <div class="col-12 col-md-2 text-right">
                                        <span data-bind="text: orderDeliveryPayment.price.displayNet() + ' ' + orderDeliveryPayment.price.currencyCode">0,00 EUR</span>
                                    </div>
                                    <div class="col-12 col-md-2 text-right font-weight-bold">
                                        <span data-bind="text: orderDeliveryPayment.price.displayGross() + ' ' + orderDeliveryPayment.price.currencyCode">0,00 EUR</span>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row py-2">
                                    <div class="col-12 col-sm-3 col-md-2 font-weight-bold d-none d-md-block">
                                        <span>kartu</span>
                                    </div>
                                    <div class="col-12 col-md"></div>
                                    <div class="col-12 col-sm-2 col-md-1"></div>
                                    <div class="col-12 col-md-2 text-right">
              <span class="d-inline-block d-md-none">
                <span>Suma be PVM</span>:
              </span>
                                        <span data-bind="text: totalPrice ? totalPrice.displayNet() + ' ' + totalPrice.currencyCode : '---'">1,82 EUR</span>
                                    </div>
                                    <div class="col-12 col-md-2 text-right font-weight-bold">
              <span class="d-inline-block d-md-none">
                <span>Suma su PVM</span>:
              </span>
                                        <span data-bind="text: totalPrice ? totalPrice.displayGross() + ' ' + totalPrice.currencyCode : '---'">2,20 EUR</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="c-btn c-btn--primary" data-dismiss="modal">
                                <span>Paruoštas</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>--}}

            <!-- /ko -->
            <!-- /ko -->
        </div>
    @endif

@endsection
