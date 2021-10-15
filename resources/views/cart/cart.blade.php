@extends('welcome')

@section('title','Krepšelis')
@section('content')
<!--    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "image": [
    "logo.jpg"
  ],
  "@id": "https://www.rm-autodalys.eu/",
  "name": "MB Kavateka",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Panerių g. 39",
    "addressCountry": "PL",
    "addressLocality": "Vilnius",
    "addressRegion": "",
    "postalCode": "03202"
  },

      "geo": {
          "@type": "GeoCoordinates",
          "latitude": 25.236373,
          "longitude": 54.665539
      },
      "url": "https://www.rm-autodalys.eu/",
  "telephone": "+370 691 31237"
}
</script>-->
    {{ Breadcrumbs::render('cart') }}

    @if(Cart::count() > 0)
        <h2>{{Cart::count()}} Items shopping cart</h2>
    <div data-bind="if: isDataLoaded(), attr: { hidden: false }">
        <!-- ko if: !data.items().length --><!-- /ko -->
        <!-- ko if: data.items().length -->
        <div class="c-panel c-panel--no-shadow list py-3">
            <div class="c-panel--no-shadow px-3">
                <div class="c-panel--no-shadow">
                    <div class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1"><span>Jūsų krepšelis</span></div>

                    <div class="row u-text-500 u-text-medium d-none d-xl-flex text-uppercase pr-4">
                        <div class="col col-auto"><img style="width: 32px;" src="https://www.rm-autodalys.eu/Assets/Themes/Kavateka/Assets/Images/blank.gif"></div>
                        <div class="col col-md-2"><span>Produkto kodas</span></div>
                        <div class="col"><span>Produkto pavadinimas</span></div>
                        <div class="col-12 col-md-2 text-right"><span>Skaičius</span></div>
                        <div class="col-12 col-md-2 text-right"><span>Kaina</span></div>
                        <div class="col-12 col-md-2 text-right"><span>Vertė</span></div>
                    </div>
                    <hr class="mt-2 mb-0">
                </div>
            </div>

            @foreach(Cart::Content() as $item)

            <div class="c-panel--no-shadow px-3">
                <div class="c-panel--no-shadow row--hover py-2">
                    <div class="row d-flex align-items-center pl-1 pr-4">

                        <div class="col-12 col-md-2 col-xl-auto ">
                            <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            <button class="c-btn-remove" data-toggle="tooltip" title="Ištrink poziciją">

                                <svg class="c-icon c-icon--remove">
                                    <use xlink:href="#remove"></use>
                                    <svg id="remove" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 16">
                                        <path d="M6.49,12.88H5.06V6.19H6.49ZM9.94,6.19H8.51v6.69H9.94ZM14.28,4.3h-.84V14.85A1.15,1.15,0,0,1,12.29,16H2.71a1.15,1.15,0,0,1-1.15-1.15V4.3H.72a.72.72,0,0,1,0-1.44H4.94V.72A.72.72,0,0,1,5.66,0H9.34a.72.72,0,0,1,.72.72V2.86h4.22a.72.72,0,1,1,0,1.44ZM12,4.5H3V14.57h9ZM6.38,2.86H8.62V1.43H6.38Z"></path>
                                    </svg>
                                </svg>

                            </button>
                            </form>
                        </div>

                        <div class="col-12 col-md-2 col-xl-2 d-flex align-items-center">
                            <div>
                                <span data-bind="text: metadata.article.displayCode">{{$item->model->reference}}</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-8 col-xl d-flex align-items-center">
                            <a class="" href="{{route('products.show', $item->model->reference)}}" data-bind="text: metadata.article.name, attr: { href: metadata.article.url }">{{$item->model->name}}</a>
                        </div>

                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 d-flex justify-content-xl-end mr-1">
                            <div class="d-flex">

                                <form id="cart" action="{{route('cart.edit',$item->rowId)}}" method="POST">
                                    {{csrf_field()}}
                                    <input class="c-input c-input--quantity" name="amount" type="number" min="1" step="1" value="{{$item->qty}}">
                                    <input name="rowId" type="hidden" value="{{$item->rowId}}">
                                    <input type="submit" hidden>
                                </form>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 d-flex flex-column justify-content-xl-center align-items-xl-end">
                            <div class="text-right text-md-left text-xl-right">
                                @if(isset($item->model->price_stock))
                                <div class="u-text-line-through u-text-color-darker">
                                    <span data-bind="text: metadata.article.prices.displayPrices.retail.displayGross">{{$item->model->price_stock}}</span>
                                    <span data-bind="text: price.currencyCode">EUR</span>
                                    <span>/</span>
                                    <span data-bind="text: metadata.article.quantityInformation.unit">vnt</span>
                                </div>
                                @endif
                                <!-- ko if: metadata.article.prices.displayPrices.retail.gross() > price.gross() --><!-- /ko -->
                                <!-- ko if: !metadata.article.prices.additionalCosts -->
                                <span data-bind="text: price.displayGross">{{$item->model->priceTax()}}</span>
                                <span data-bind="text: price.currencyCode">EUR</span>
                                <span>/</span>
                                <span data-bind="text: metadata.article.quantityInformation.unit">vnt</span>
                                <!-- /ko -->
                                <!-- ko if: metadata.article.prices.additionalCosts --><!-- /ko -->
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-xl-2 d-flex flex-column justify-content-center align-items-end">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center" data-bind="if: processing(), attr: { hidden: false }"></div>
                                <div class="c-product__price-gross" data-bind="css: { 'c-product-price--loading': processing() }">
                                    <span data-bind="text: priceSummary.displayGross">{{$item->qty*$item->model->priceTax()}}</span>
                                    <span data-bind="text: price.currencyCode">EUR</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <hr class="my-0">

            </div>
        @endforeach

            <!-- /ko -->
        </div>

        <div class="c-panel c-panel--no-shadow p-3 mt-4">
            <div class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">
                <span>Užsakymo parinktys</span>
            </div>

            <div class="row pl-4 mb-4">
                <div class="col-12 col-lg-4 mb-3 mb-md-0">
                    <div class="c-form-group">
                        <label class="mb-2">
                            <span class="u-text-400">Dokumento tipas</span>
                        </label>
                        <div class="c-select__wrapper w-100">
                            <select class="c-select c-select--block">
                                <option value="F">Faktūra</option>
                                <option value="P">Čekis</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 mb-3 mb-md-0">
                    <div class="c-form-group" data-bind="">

                        <label class="mb-2">
                            <span>Transporto galimybės</span>
                        </label>
                        <div class="c-select__wrapper w-100">
                            <select id="delivery_select" name="delivery_select" class="c-select c-select--block" required>
                                <option value="">Pasirinkite pristatymo būdą</option>
                                @foreach($deliveries as $delivery)
                                <option value="{{$delivery->id}}">{{$delivery->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- ko if: selectedTransport() && selectedTransport().comment --><!-- /ko -->
                </div>

                <div class="col-12 col-lg-4 mb-3 mb-md-0">
                    <div class="c-form-group mb-2" data-bind="css: { 'mb-2': selectedPayment() &amp;&amp; selectedPayment().comment }">
                        <label class="mb-2">
                            <span>Mokėjimo būdas</span>
                        </label>

                        <div class="c-select__wrapper w-100">
                            <!-- ko if: selectedTransport() --><!-- /ko -->
                            <!-- ko if: !selectedTransport() -->
                            <select id="payment_select" name="payment_select" class="c-select c-select--block" disabled required>
                                <option value="">
                                    Pirmiausia pasirinkite transportavimo būdą
                                </option>
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                            </select>
                            <!-- /ko -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-start px-4 px-md-2 mt-3">
                <div class="col-12 col-md-6 c-form-group">
                @if(!session()->get('coupon'))
                    <!-- ko if: !selectedVoucher() -->
                    <form class="d-flex flex-column" action="{{route('coupon.store')}}" method="post">
                        <div class="d-flex flex-column flex-md-row">
                            {{csrf_field()}}
                            <input class="c-input c-input--voucher mb-2 mb-md-0 mr-md-3" placeholder="Įveskite nuolaidos kodą" id="coupon_code" name="coupon_code" >
                            <button class="c-btn c-btn--secondary text-uppercase ml-lg-4" type="submit">
                                <span>Įjungti</span>
                            </button>
                        </div>
                    </form>
                    <span data-bind="if: invalidVoucher()"></span>
                @endif
                </div>
            </div>


        </div>
        <div class="c-panel c-panel--no-shadow p-3 mt-4">
            <div class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">
                <span>Užsakymo išlaidų suvestinė</span>
            </div>
            <div class="c-panel c-panel--no-shadow">
                <div class="c-cart-summary--sm px-4">


                    <div class="d-flex my-2">
      <span>
        <span class="mr-1">užsakymas:</span>
          <!-- ko if: selectedDocumentType() -->
         <span class="text-muted">(<span data-bind="text: selectedDocumentType().name">Čekis</span>) </span>
          <!-- /ko -->
      </span>
                        <span class="ml-auto">
        <span data-bind="text: data.priceSummary.itemsPrice.displayGross()">{{Cart::total(2,'.','')}}</span>
        <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
      </span>
                    </div>
                    <hr>
                    <div class="d-flex my-2">
      <span>
        <span class="mr-1">Transportas:</span>
          <!-- ko if: selectedTransport() --><!-- /ko -->
      </span>
                        <span class="ml-auto">
        <span id="transport_price">0.00</span>
        <span>EUR</span>
      </span>
                    </div>
                    <hr>
                    <div class="d-flex my-2">
      <span>
        <span class="mr-1">Apmokėjimas:</span>
          <!-- ko if: selectedPayment() -->
        <span class="text-muted">(<span>Pervedimas į banką</span>)</span>
          <!-- /ko -->
      </span>
                        <span class="ml-auto">
        <span>0.00</span>
        <span>EUR</span>
      </span>
                    </div>
                    @if(session()->get('coupon'))
                    <hr>
                    <div class="d-flex my-2">
      <span>
        <span class="mr-1">Nuolaida:</span>
          <!-- ko if: selectedPayment() -->
        <span class="text-muted">(<span data-bind="text: selectedPayment().name">{{ session()->get('coupon')['name'] }}</span>)</span>
            <form action="{{route('coupon.destroy',session()->get('coupon')['name'])}}" method="post" style="display: inline;">
                {{csrf_field()}}
                {{method_field('delete')}}
                <span class="text-muted">(<button class="btn btn-link" type="submit">remove</button>)</span>
            </form>
          <!-- /ko -->
      </span>
                        <span class="ml-auto">
        <span data-bind="text: data.priceSummary.payment.displayGross()">- {{ session()->get('coupon')['discount'] }}</span>
        <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
      </span>
                    </div>

                    <hr>

                    <div class="d-flex my-2 align-items-center" style="white-space: nowrap;">
                        <span class="c-headline u-text-medium u-text-color-body mb-0">
                            <span>Iš viso:</span>
                        </span>
                        <div class="c-headline u-text-medium u-text-color-secondary mb-0 ml-auto">
                            <span id="total-cart" data-bind="text: data.priceSummary.total.displayGross()">{{$newTotal}}</span>
                            <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
                        </div>
                    </div>
                    <div class="text-right u-text-color-body u-text-small mb-4">
                        <span id="subtotal-cart" data-bind="text: data.priceSummary.total.displayNet()">{{$newSubTotal}}</span>
                        <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
                        <span>/ be PVM</span>
                    </div>
                    @else
                        <div class="d-flex my-2 align-items-center" style="white-space: nowrap;">
                        <span class="c-headline u-text-medium u-text-color-body mb-0">
                            <span>Iš viso:</span>
                        </span>
                            <div class="c-headline u-text-medium u-text-color-secondary mb-0 ml-auto">
                                <span id="total-cart" aria-valuenow="">{{Cart::total(2,'.','')}}</span>
                                <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
                            </div>
                        </div>
                        <div class="text-right u-text-color-body u-text-small mb-4">
                            <span id="subtotal-cart">{{Cart::subtotal(2,'.','')}}</span>
                            <span data-bind="text: data.priceSummary.itemsPrice.currencyCode">EUR</span>
                            <span>/ be PVM</span>
                        </div>
                    @endif

                </div>
                <div class="my-4">
                    <div class="d-flex justify-content-center">
                        <form action="{{route('orders.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="number" id="delivery" name="delivery" value="" hidden>
                            <input type="number" id="payment" name="payment" value="" hidden>
                            <button class="c-btn-grey c-btn--tertiary c-btn--xl px-sm-5 text-uppercase" id="btn-order" disabled>
                                <span class="mx-5">Aš pateikiu užsakymą</span>
                            </button>
                        </form>

                    </div>
                </div>
<!--
                <div class="alert alert-danger">
                    <span>Pasirinkite transporto ir apmokėjimo būdą</span>
                </div>
                -->
            </div>

        </div>


    </div>
    @else
        <div class="text-center my-5 py-5">
        <span class="c-headline">
          <span>Jūsų krepšelis tuščias.</span>
        </span>
        </div>
    @endif
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script type="text/javascript">
        $('#delivery_select').change(function () {
            let delivery = $('#delivery_select').find(":selected").val();


            if (delivery === '2') {
                $('#transport_price').text('3.84')
                let total = $('#total-cart')
                total.text(parseFloat(total.text()) + 3.84)
                let totalSub = $('#subtotal-cart')
                totalSub.text(parseFloat(totalSub.text()) + 3.17)

            } else {
                $('#transport_price').text('0.00')
                let total = $('#total-cart')
                total.text({{Cart::total(2,'.','')}})
                let totalSub = $('#subtotal-cart')
                totalSub.text({{Cart::subtotal(2,'.','')}})
            }

            $('input[id=delivery]').val(delivery);

            if ($('#delivery_select').val() === "") {
                $('#payment_select').attr("disabled", true);
            } else {
                $('#payment_select').attr("disabled", false);
            }
        })
</script>
{{--<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#delivery_select').change(function(e){

        e.preventDefault();

        let delivery = $('#delivery_select').find(":selected").val();

        $.ajax({
            type:'POST',
            url:"{{ route('ajax.cart') }}",
            data:{delivery:delivery},
            success:function(data){
                alert(data.success);
            }
        });

    });
</script>--}}
@endsection
