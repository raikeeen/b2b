@extends('welcome')

@section('title','Product')
@section('content')
    <div class="row bread-crumb-row">
        <ol class="bread-crumb">
            <li class="bread-crumb-item">
                <a class="bread-crumb-link" href="">
                        <span itemprop="name">
                            <svg class="bread-crumb-icon">
                                <svg id="breadcrumb-home-name" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                    <path d="M14,6.8,7,0,0,6.8V14H5.62V9.43H8.38V14H14Zm-1.25,6H9.63V8.21H4.37v4.57H1.25V7.31L7,1.72l5.75,5.59Z"></path>
                                </svg>
                                <use xlink:href="#breadcrumb-home-name"></use>
                            </svg>
                        </span>
                </a>
            </li>

            <li class="bread-crumb-item">
                <a class="bread-crumb-link" href="">
                    <span itemprop="name">Automobilių dalys</span>
                </a>
            </li>
            <li class="bread-crumb-item">
                <a class="" href="">
                    <span itemprop="name">Product</span>
                </a>
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-5 mr-5">
            <div class="c-panel c-panel--no-shadow">
                <div class="c-product-image">
                    <div class="c-product-image__slides owl-carousel--product owl-carousel owl-loaded owl-drag">

                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1934px;">
                                <div class="owl-item active" style="width: 386.656px;">
                                    <div class="c-product-image__slide">
                                        <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-01.jpg" data-toggle="lightbox" data-gallery="big-photo">
                                            <img class="c-product-image__image" style="width: 100%" src="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A02002D-01.jpg" alt="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                        </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-12">
                    <h1 class="product-name pl-lg-3 py-1">AMORTIZATORIAUS ATRAMINIS GUOLIS</h1>

                    <div class="pl-3 mb-0 mt-3 mb-3">
                        <span>Prekės kodas:</span>
                        <span class="c-headline--light c-headline--sm d-inline">A02002D</span>
                    </div>
                    <div class="c-product__description mb-3 pl-3">
                        TOYOTA YARIS 05-, HONDA JAZZ/FIT GD 02- /PRIEKIS/          </div>
                </div>
                <div class="col-12 d-flex flex-column">
                    <div class="row">
                        <div class="col col-sm-12 d-flex justify-content-start order-1 order-sm-2">
                            <div class="mb-4 mt-2 pl-3">


                                <small class="d-block text-muted text-uppercase c-product-stock__text">
                                    <span>Prieinamumas</span>
                                </small>
                                <div class="d-flex flex-column flex-xl-row">
                                    <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                        <span class="c-product-stock__name mr-2">Parduotuvė</span>
                                        <span class="product-stock-available">
            0 <span class="ml-1">vnt</span>
        </span>
                                    </div>
                                    <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                        <span class="c-product-stock__name mr-2">Sandėlis</span>
                                        <span class="product-available">
            &gt;5 <span class="ml-1">vnt</span>
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
                                    2,49
                                    €
                                </div>



                            </div>
                            <div class="c-product__price-net">
                                / 2,06
                                €
                                <span>be PVM</span>
                            </div>

                        </div>
                        <div class="col-sm-6 mt-1 d-flex justify-content-end align-items-end">


                            <div type="ADD_TO_CART" data-control-type="Order"><form data-article-code="A02002D" data-bind="submit: order" data-name="AMORTIZATORIAUS ATRAMINIS GUOLIS" data-price-currency="EUR" data-price-gross="2.49" data-price-net="2.06" data-price-tax="1.21" data-producer-name="NTY" data-type="ADD_TO_CART">
                                    <div class="d-flex">
                                        <input class="input-quantity" autocomplete="off" data-bind="init: amount.bind($root, 1), value: amount, valueUpdate: 'afterkeydown'" min="1" name="amount" step="1" type="number" value="1">

                                        <button style="background: #3b6ded;" class="c-btn c-btn--secondary" type="submit" data-bind="css: { 'c-btn--loading': submitted() }" data-loading="Prašome palaukti ...">
        <span class="d-flex">


<svg class="icon-search">
  <use xlink:href="#add-to-cart">
      <svg id="add-to-cart" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 22">
    <path d="M27,4,23.36,14.11A1.39,1.39,0,0,1,22,15H10l.5,1.37H22.32a.51.51,0,0,1,.51.5.5.5,0,0,1-.51.5H9.79L3.84,1H.51A.5.5,0,0,1,0,.5.5.5,0,0,1,.51,0H4.57l1,2.74h0l.36,1h0L9.65,14H22a.39.39,0,0,0,.36-.25l3.54-10h-.05l.37-1a1,1,0,0,1,.57.36A.91.91,0,0,1,27,4ZM22.11,20a2.09,2.09,0,1,1-2.09-2A2.06,2.06,0,0,1,22.11,20Zm-1,0A1.06,1.06,0,0,0,19,20a1.06,1.06,0,0,0,2.11,0Zm-6.8,0a2.08,2.08,0,1,1-2.08-2A2.06,2.06,0,0,1,14.28,20Zm-1,0a1.06,1.06,0,1,0-1.06,1A1.06,1.06,0,0,0,13.26,20ZM16.44,9V1h-1V9L12.57,6.19l-.72.71,4.08,4L20,6.9l-.72-.71Z"></path>
  </svg>
  </use>
</svg>

          <span class="ml-1">Įdėti į krepšelį</span>
        </span>
                                        </button>
                                    </div>
                                </form></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 c-panel-tabs--border-after mt-4" data-control-type="ArticlePage">
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="c-panel-tabs__item">
                    <a class="c-panel-tabs__item-link c-panel-tabs__item-link--subarticle active show" data-toggle="tab" data-target="#oem-F2000" title="OEM kodai">
                        <span>OEM kodai</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content c-panel c-panel--no-shadow mt-3 mt-sm-0" id="myTabContent">
                <div class="tab-pane active show" id="oem-F2000">
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
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                HONDA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">51726-SAA-003</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                HONDA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">51726-SAA-013</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                HONDA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">51726-SFA-005</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                NISSAN
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">54325-1HA0A</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                RENAULT
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">543251HA0A</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                SUZUKI
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">41741-58J00</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                SUZUKI
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">41741-58J00-000</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                SUZUKI
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">41741-62J00</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                SUZUKI
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">41741-62J00-000</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                TOYOTA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">48619-0D010</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                TOYOTA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">48619-0D011</span>
                            </div>
                        </div>
                        <div class="row row--hover mb-0">
                            <div class="col-4 u-bd-bottom-left py-2">
                                TOYOTA
                            </div>
                            <div class="col-8 u-bd-top-out py-2">
                                <span class="">48619-0H010</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="description">


                    <div id="hook_seoproduct" class="" data-asp-hook="67" data-asp-hook-name="seoProduct">
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Produkt -->

                        <div data-control-hook-id="79" data-control-id="56" data-control-order="1" data-control-name="Treść SEO na Produkcie - Produkt" data-control-type="CustomContent">
                        </div>
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Produkt -->
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Kategorie -->

                        <div data-control-hook-id="80" data-control-id="57" data-control-order="2" data-control-name="Treść SEO na Produkcie - Kategorie" data-control-type="CustomContent">
                        </div>
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Kategorie -->
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Producent -->

                        <div data-control-hook-id="81" data-control-id="58" data-control-order="3" data-control-name="Treść SEO na Produkcie - Producent" data-control-type="CustomContent">
                        </div>
                        <!-- Tre&#x15B;&#x107; SEO na Produkcie - Producent -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
