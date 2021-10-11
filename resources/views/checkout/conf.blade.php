@extends('welcome')

@section('title','Company')
@section('content')
    <div data-bind="if: isDataLoaded(), attr: { hidden: false }">
        <div class="alert alert-success">
            <span>Užsakymas pateiktas sėkmingai!</span>
        </div>
        <h1 class="c-headline c-headline--semi-light u-bd-secondary py-1 mb-0">
            <span>Užsakymas</span>
            <span class="u-text-brand-primary" data-bind="text: id()">U000083/2021/000003</span>
            (<span data-bind="text: document()">Faktūra</span>)
        </h1>
        <div class="text-muted mb-4">
            <span>Statusas:</span>
            <span data-bind="text: status()">Uždarytas</span>
        </div>
        <!-- ko if: paymentStatus() === 200 --><!-- /ko -->
        <!-- ko if: paymentStatus() === 100 --><!-- /ko -->
        <!-- ko if: paymentStatus() === 300 --><!-- /ko -->

        <div class="row">
            <div class="col">
        <span class="c-headline c-headline--sm">
          <span>Kliento duomenys</span>
        </span>
                <p class="u-text-color-darker" style="white-space: pre-line;" data-bind="text: deliveryAddress().address()">Mark Jankelaic
                    Adresas: J.Balcikonio street 3
                    08247 Vilnius

                    Telefonas: 864839588
                    E-mail: mark.jankelait@gmail.com</p>
                <div data-bind="if: invoiceAddress()"></div>
            </div>
            <!-- ko if: differentDeliveryAddress() --><!-- /ko -->
            <div class="col">
                <!-- ko if: canBePaid() --><!-- /ko -->
            </div>
        </div>
        <div class="c-panel--no-shadow py-3 mt-4">
            <p class="c-headline c-headline--semi-light u-bd-secondary py-1 mb-4">
                <span>Užsakytos prekės</span>
            </p>


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
            <!-- ko foreach: order().items -->
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
                    <span data-bind="text: order().itemsPrice ? order().itemsPrice.displayNet() + ' ' + order().itemsPrice.currencyCode : '---'">1,82 EUR</span>
                </div>
                <div class="col-12 col-md-2 text-right font-weight-bold">
          <span class="d-inline-block d-md-none">
            <span>Suma su PVM</span>:
          </span>
                    <span data-bind="text: order().itemsPrice ? order().itemsPrice.displayGross() + ' ' + order().itemsPrice.currencyCode : '---'">2,20 EUR</span>
                </div>
            </div>
        </div>

        <div class="c-panel--no-shadow py-3 mt-4">
            <p class="c-headline c-headline--semi-light u-bd-secondary py-1 mb-4">
                <span>Sumuojant</span>
            </p>
            <div class="row">
                <div class="col-12 col-sm-3 col-md-2 d-none d-md-block"><span>Transportas:</span></div>
                <div class="col-12 col-md">
                    <strong data-bind="text: order().orderDeliveryTransport.name">Atsiimsiu pats</strong>
                </div>
                <div class="col-12 col-sm-2 col-md-1"></div>
                <div class="col-12 col-md-2 text-right">
                    <span data-bind="text: order().orderDeliveryTransport.price.displayNet() + ' ' + order().orderDeliveryTransport.price.currencyCode">0,00 EUR</span>
                </div>
                <div class="col-12 col-md-2 text-right font-weight-bold">
                    <span data-bind="text: order().orderDeliveryTransport.price.displayGross() + ' ' + order().orderDeliveryTransport.price.currencyCode">0,00 EUR</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-3 col-md-2 d-none d-md-block"><span>Apmokėjimas:</span></div>
                <div class="col-12 col-md">
                    <strong data-bind="text: order().orderDeliveryPayment.name">Pervedimas į banką</strong>
                </div>
                <div class="col-12 col-sm-2 col-md-1"></div>
                <div class="col-12 col-md-2 text-right">
                    <span data-bind="text: order().orderDeliveryPayment.price.displayNet() + ' ' + order().orderDeliveryPayment.price.currencyCode">0,00 EUR</span>
                </div>
                <div class="col-12 col-md-2 text-right font-weight-bold">
                    <span data-bind="text: order().orderDeliveryPayment.price.displayGross() + ' ' + order().orderDeliveryPayment.price.currencyCode">0,00 EUR</span>
                </div>
            </div>
            <hr class="my-2">
            <div class="row py-2">
                <div class="col-12 col-sm-3 col-md-2 font-weight-bold d-none d-md-block"><span>kartu</span></div>
                <div class="col-12 col-md"></div>
                <div class="col-12 col-sm-2 col-md-1"></div>
                <div class="col-12 col-md-2 text-right">
          <span class="d-inline-block d-md-none">
            <span>Suma be PVM</span>:
          </span>
                    <span data-bind="text: order().totalPrice ? order().totalPrice.displayNet() + ' ' + order().totalPrice.currencyCode : '---'">1,82 EUR</span>
                </div>
                <div class="col-12 col-md-2 text-right font-weight-bold">
          <span class="d-inline-block d-md-none">
            <span>Suma su PVM</span>:
          </span>
                    <span data-bind="text: order().totalPrice ? order().totalPrice.displayGross() + ' ' + order().totalPrice.currencyCode : '---'">2,20 EUR</span>
                </div>
            </div>
        </div>

    </div>
@endsection
