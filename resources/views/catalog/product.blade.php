@extends('welcome')

@section('title','Prekė')
@section('content')
{{ Breadcrumbs::render('product', $product->name, $product->reference) }}
      {{--  <product></product>--}}

        <div class="row">
            <div class="col-lg-4 col-md-5 mr-5">
                <div class="c-panel c-panel--no-shadow">
                    <div class="c-product-image">
                        <div class="c-product-image__slides owl-carousel--product owl-carousel owl-loaded owl-drag">


                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1934px;"><div class="owl-item active" style="width: 386.656px;"><div class="c-product-image__slide">
                                            <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-01.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                                <img class="c-product-image__image" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-01.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                            </a>
                                        </div></div><div class="owl-item" style="width: 386.656px;"><div class="c-product-image__slide">
                                            <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-02.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                                <img class="c-product-image__image" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-02.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                            </a>
                                        </div></div><div class="owl-item" style="width: 386.656px;"><div class="c-product-image__slide">
                                            <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-03.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                                <img class="c-product-image__image" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-03.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                            </a>
                                        </div></div><div class="owl-item" style="width: 386.656px;"><div class="c-product-image__slide">
                                            <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-04.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                                <img class="c-product-image__image" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-04.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                            </a>
                                        </div></div><div class="owl-item" style="width: 386.656px;"><div class="c-product-image__slide">
                                            <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-05.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                                <img class="c-product-image__image" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-05.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                            </a>
                                        </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
                    </div>
                </div>
                <div class="c-product__images-nav owl-carousel--product-nav owl-carousel mt-2 mb-3 owl-loaded owl-drag">



                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 490px;"><div class="owl-item active" style="width: 92.914px; margin-right: 5px;"><div class="c-product__image-nav current">
                                    <div class="c-product__image-nav--slide">
                                        <img class="c-product__image-nav--img" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-01.jpg&amp;width=90&amp;height=72" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                    </div>
                                </div></div><div class="owl-item active" style="width: 92.914px; margin-right: 5px;"><div class="c-product__image-nav">
                                    <div class="c-product__image-nav--slide">
                                        <img class="c-product__image-nav--img" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-02.jpg&amp;width=90&amp;height=72" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                    </div>
                                </div></div><div class="owl-item active" style="width: 92.914px; margin-right: 5px;"><div class="c-product__image-nav">
                                    <div class="c-product__image-nav--slide">
                                        <img class="c-product__image-nav--img" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-03.jpg&amp;width=90&amp;height=72" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                    </div>
                                </div></div><div class="owl-item active" style="width: 92.914px; margin-right: 5px;"><div class="c-product__image-nav">
                                    <div class="c-product__image-nav--slide">
                                        <img class="c-product__image-nav--img" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-04.jpg&amp;width=90&amp;height=72" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                    </div>
                                </div></div><div class="owl-item" style="width: 92.914px; margin-right: 5px;"><div class="c-product__image-nav">
                                    <div class="c-product__image-nav--slide">
                                        <img class="c-product__image-nav--img" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-05.jpg&amp;width=90&amp;height=72" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                    </div>
                                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <h1 class="product-name pl-lg-3 py-1">{{$product->name}}</h1>

                        <div class="pl-3 mb-0 mt-3 mb-3">
                            <span>Prekės kodas:</span>
                            <span class="c-headline--light c-headline--sm d-inline">{{$product->reference}}</span>
                        </div>
                        <div class="product-description mb-3 pl-3">
                            {{$product->short_description}}
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-column">
                        <div class="row">
                            <div class="col col-sm-12 d-flex justify-content-start order-1 order-sm-2">
                                <div class="mb-4 mt-2 pl-3">


                                    <small class="d-block text-muted text-uppercase product-stock-text">
                                        <span>Prieinamumas</span>
                                    </small>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="product-stock-container d-flex justify-content-center align-items-center pl-0">
                                            <span class="c-product-stock__name mr-2">Parduotuvė</span>
                                            @if($product->stock_shop === 0)
                                                <span class="c-product-stock__availability">{{$product->stock_shop}}
                                                        <span class="ml-1">vnt</span>
                                                    </span>
                                            @elseif($product->stock_shop < 3 )
                                                <span class="c-product-stock__availability c-product-stock__availability--less">{{$product->stock_shop}}
                                                            <span class="ml-1">vnt</span>
                                                        </span>
                                            @else
                                                <span class="c-product-stock__availability c-product-stock__availability--more">{{$product->stock_shop}}
                                                            <span class="ml-1">vnt</span>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="product-stock-container d-flex justify-content-center align-items-center pl-0">
                                            <span class="c-product-stock__name mr-2">Sandėlis</span>
                                            @if($product->stock_supplier === 0)
                                                <span class="c-product-stock__availability">{{$product->stock_supplier}}
                                                        <span class="ml-1">vnt</span>
                                                    </span>
                                            @elseif($product->stock_supplier < 3 )
                                                <span class="c-product-stock__availability c-product-stock__availability--less">{{$product->stock_supplier}}
                                                            <span class="ml-1">vnt</span>
                                                        </span>
                                            @else

                                                <span class="c-product-stock__availability c-product-stock__availability--more">@if($product->stock_supplier > 4)&gt;5 @else {{$product->stock_supplier}}@endif
                                                            <span class="ml-1">vnt</span>
                                                        </span>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="w-100 mb-4">
                        <div class="row pl-3">
                            <div class="col col-sm-6 text-right d-flex flex-column align-items-start">
                                <div class="d-flex align-items-center">
                                    <div class="product-price-gross">
                                        {{$product->price*1.21}}
                                        €
                                    </div>
                                </div>
                                <div class="">
                                    / {{$product->price}}
                                    €
                                    <span>be PVM</span>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-1 d-flex justify-content-end align-items-end">
                                @if($product->stock_shop + $product->stock_supplier != 0)
                                <div type="ADD_TO_CART" data-control-type="Order">

                                    <form action="{{route('cart.store')}}" method="post">
                                        <div class="d-flex">
                                        {{csrf_field()}}
                                            <input class="c-input c-input--quantity c-input--no-border" autocomplete="off" data-bind="" min="1" name="amount" step="1" type="number" value="1">
                                            <input type="hidden" name="id" value="{{$product->id}}">


                                            <button style="background: #3b6ded;" class="c-btn c-btn--secondary" type="submit" data-bind="css: { 'c-btn--loading': submitted() }" data-loading="Prašome palaukti ...">
                                                <span class="d-flex">
                                                <svg class="icon-search">
                                                    <use xlink:href="#add-to-cart">
                                                        <svg id="add-to-cart" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 22">
                                                        <path d="M27,4,23.36,14.11A1.39,1.39,0,0,1,22,15H10l.5,1.37H22.32a.51.51,0,0,1,.51.5.5.5,0,0,1-.51.5H9.79L3.84,1H.51A.5.5,0,0,1,0,.5.5.5,0,0,1,.51,0H4.57l1,2.74h0l.36,1h0L9.65,14H22a.39.39,0,0,0,.36-.25l3.54-10h-.05l.37-1a1,1,0,0,1,.57.36A.91.91,0,0,1,27,4ZM22.11,20a2.09,2.09,0,1,1-2.09-2A2.06,2.06,0,0,1,22.11,20Zm-1,0A1.06,1.06,0,0,0,19,20a1.06,1.06,0,0,0,2.11,0Zm-6.8,0a2.08,2.08,0,1,1-2.08-2A2.06,2.06,0,0,1,14.28,20Zm-1,0a1.06,1.06,0,1,0-1.06,1A1.06,1.06,0,0,0,13.26,20ZM16.44,9V1h-1V9L12.57,6.19l-.72.71,4.08,4L20,6.9l-.72-.71Z"></path></svg>
                                                    </use>
                                                </svg>
                                                <span class="ml-1">Įdėti į krepšelį</span>
                                            </span>
                                            </button>
                                        </div>
                                    </form>


                                </div>
                                @else
                                    <button class="c-btn c-btn--blue text-uppercase" type="button" data-toggle="modal" data-article-code="F02027FF" data-article-name=" KURO FILTRAS" data-target="#article-question-modal">
                                        <svg class="c-icon c-icon--ask">
                                            <use xlink:href="#ask-about">
                                                <symbol id="ask-about" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 22">
                                                    <path d="M0,15.78a1,1,0,0,0,1,1H17.41l3.77,4.81A1,1,0,0,0,22,22a1,1,0,0,0,.33-.06A1,1,0,0,0,23,21V1a1,1,0,0,0-1-1H1A1,1,0,0,0,0,1ZM2,2.05H21V18l-2.25-2.87a1,1,0,0,0-.8-.39H2Zm8.42,8.13V10c0-.74.34-1.33,1.45-2.13.69-.5.86-.89.86-1.33s-.36-1-1.21-1A1.23,1.23,0,0,0,10.18,6.7H8.38c.06-.9.79-2.31,3.21-2.3s3,1.25,3,2.16-.31,1.3-1.38,2.09c-.66.5-.88.9-.88,1.41v.12Zm0,2.55V10.88h1.9v1.85Z"></path>
                                                </symbol>
                                            </use>
                                        </svg>

                                        <span class="ml-1">Klauskite produkto</span>
                                    </button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 tabs-border-after mt-4" data-control-type="ArticlePage">
                <ul class="nav" id="myTab" role="tablist">

                    <li class="tabs-item">
                        <a class="tabs-item-link-subarticle active show" data-toggle="tab" data-target="#oem-F2000" title="OEM kodai">
                            <span class="tabs-nav">OEM kodai</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content c-panel c-panel--no-shadow mt-3 mt-sm-0" id="myTabContent">
                    <div class="tab-pane active show">
                        <div class="pb-2 mt-3 mt-sm-0">
                            <div class="row font-weight-bold pt-2">
                                <div class="col-4 u-bd-bottom-left u-bd-bottom-left--with-top text-uppercase py-2">
                                    <span>Gamintojas</span>
                                </div>
                                <div class="col-8 u-bd-top-out text-uppercase py-2">
                                    <span>OE kodai</span>
                                </div>
                            </div>

                            <div class="row row--hover mb-0">
                                <div class="col-4 u-bd-bottom-left py-2">
                                    OE
                                </div>
                                <div class="col-8 u-bd-top-out py-2">
                                    <span class="">48619-0D011</span>
                                </div>
                            </div>
                            <div class="row row--hover mb-0">
                                <div class="col-4 u-bd-bottom-left py-2">
                                    CITROEN
                                </div>
                                <div class="col-8 u-bd-top-out py-2">
                                    <span class="">5035.57</span>
                                </div>
                            </div>
                            <div class="row row--hover mb-0">
                                <div class="col-4 u-bd-bottom-left py-2">
                                    CITROEN
                                </div>
                                <div class="col-8 u-bd-top-out py-2">
                                    <span class="">5035.57</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
