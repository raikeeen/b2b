@extends('welcome')

@section('title','dashboard')
@section('content')
    <style>
        #footer {
            position: relative !important;
        }
    </style>
    <div class="row mt-3 mt-sm-4">
        <div class="col-12 col-lg-3">
            <div class="cat">
                <div class="header-cat justify-content-between align-items-center">
                    <span class="pl-2 py-1 mb-0">Prekių grupės</span>
                    <hr class="border-bottom-blue">
                </div>
                <div class="body d-none d-lg-block">
                    <li class="cat-menu-item border-bottom mx-2 mb-3 pb-2 pl-1">
                        <div class="">
                            <a class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               href="/"
                               title="AMORTIZAVIMO SISTEMA">
                                <span class="c-category-menu__name mr-1"> AMORTIZAVIMO SISTEMA</span>
                                <svg class="cat-icon-red">
                                    <use xlink:href="#category-show">
                                        <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 12 12">
                                            <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>
                                        </svg>
                                    </use>
                                </svg>
                                <svg class="cat-icon-blue">
                                    <use xlink:href="#category-hide">
                                        <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 10.5 10.5">
                                            <path
                                                d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                        </svg>
                                    </use>
                                </svg>
                            </a>
                            <ul class="c-category-menu__children dropdown-menu px-3 "
                                id="category-drop">
                                <li class="c-category-menu__children__item py-2 text-left">
                                    <a class="c-category-menu__children__link" id="category-item" href=""
                                       title="AMORT. MONTAVIMO ELEMENTAI">AMORT. MONTAVIMO ELEMENTAI</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">


            <div id="hook_mainslider" class="" data-asp-hook="70" data-asp-hook-name="mainSlider">
                <!-- Slider g&#x142;&#xF3;wny -->

                <div data-control-hook-id="114" data-control-id="11" data-control-order="3"
                     data-control-name="Slider główny" data-control-type="SliderSlick">


                    <div class="mb-sm-1">

                        <div class="owl-carousel-custom__wrapper">
                            <div class="owl-prev-custom--main-slider  owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--prev">
  <use xlink:href="#arrow-left-slider"></use>
    <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
    <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
  </svg>
</svg>
</span>
                            </div>

                            <div class="c-main-page-slider">
                                <div class="owl-carousel main-slider_owl-carousel-custom owl-loaded owl-drag"
                                     data-owl="{'items':1, 'singleItem': true, 'dots': false, 'nav': false, 'autoplay': true, 'autoplayTimeout': 3000, 'autoplayHoverPause': true, 'lazyLoad': true}">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                             style="transform: translate3d(-1855px, 0px, 0px); transition: all 0s ease 0s; width: 4638px;">
                                            <div class="owl-item cloned" style="width: 907.5px; margin-right: 20px;">
                                                <div class="c-main-page-slider__item">
                                                    <a href="/" title="">
                                                        <img class="c-main--page-baner__img owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FPaie%C5%A1ka%20pagal%20katalog%C4%85.jpg"
                                                             alt=""
                                                             src="{{asset('/storage/banners/banner.jpg')}}"
                                                             style="opacity: 1;">
                                                        <div class="c-main-page-baner__text pl-2 pl-lg-5">
                                                            <div class="c-main-page-baner__slogan mt-3 mt-md-0">

                                                            </div>
                                                            <div class="c-main-page--baner__quotation">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 907.5px; margin-right: 20px;">
                                                <div class="c-main-page-slider__item">
                                                    <a href="/" title="">
                                                        <img class="c-main--page-baner__img owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FPaie%C5%A1ka%20pagal%20katalog%C4%85.jpg"
                                                             alt=""
                                                             src="{{asset('/storage/banners/banner.jpg')}}"
                                                             style="opacity: 1;">
                                                        <div class="c-main-page-baner__text pl-2 pl-lg-5">
                                                            <div class="c-main-page-baner__slogan mt-3 mt-md-0">

                                                            </div>
                                                            <div class="c-main-page--baner__quotation">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 907.5px; margin-right: 20px;">
                                                <div class="c-main-page-slider__item">
                                                    <a href="/#" title="">
                                                        <img class="c-main--page-baner__img owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FPaie%C5%A1ka%20pagal%20katalog%C4%85.jpg"
                                                             alt=""
                                                             src="{{asset('/storage/banners/banner.jpg')}}"
                                                             style="opacity: 1;">
                                                        <div class="c-main-page-baner__text pl-2 pl-lg-5">
                                                            <div class="c-main-page-baner__slogan mt-3 mt-md-0">

                                                            </div>
                                                            <div class="c-main-page--baner__quotation">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 907.5px; margin-right: 20px;">
                                                <div class="c-main-page-slider__item">
                                                    <a href="/#" title="">
                                                        <img class="c-main--page-baner__img owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FPaie%C5%A1ka%20pagal%20katalog%C4%85.jpg"
                                                             alt=""
                                                             src="{{asset('/storage/banners/banner.jpg')}}"
                                                             style="opacity: 1;">
                                                        <div class="c-main-page-baner__text pl-2 pl-lg-5">
                                                            <div class="c-main-page-baner__slogan mt-3 mt-md-0">

                                                            </div>
                                                            <div class="c-main-page--baner__quotation">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 907.5px; margin-right: 20px;">
                                                <div class="c-main-page-slider__item">
                                                    <a href="/#" title="">
                                                        <img class="c-main--page-baner__img owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FPaie%C5%A1ka%20pagal%20katalog%C4%85.jpg"
                                                             alt=""
                                                             src="{{asset('/storage/banners/banner.jpg')}}"
                                                             style="opacity: 1;">
                                                        <div class="c-main-page-baner__text pl-2 pl-lg-5">
                                                            <div class="c-main-page-baner__slogan mt-3 mt-md-0">

                                                            </div>
                                                            <div class="c-main-page--baner__quotation">

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled">
                                        <button type="button" role="presentation" class="owl-prev"><span
                                                aria-label="Previous">‹</span></button>
                                        <button type="button" role="presentation" class="owl-next"><span
                                                aria-label="Next">›</span></button>
                                    </div>
                                    <div class="owl-dots disabled"></div>
                                </div>
                            </div>

                            <div class="owl-next-custom--main-slider owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--next">
  <use xlink:href="#arrow-right-slider"></use>
    <svg id="arrow-right-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
    <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
  </svg>
</svg>
</span>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Slider g&#x142;&#xF3;wny -->
            </div>

            <div class="row pb-4 p-sm-4">
                <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">


                    <svg class="c-icon c-info__item--icon">
                        <use xlink:href="#info-shopping"></use>
                        <svg id="info-shopping" viewBox="0 0 44 44">

                            <circle class="filter-grey" cx="22" cy="22" r="22"></circle>
                            <path class="filter-blue" d="M14.1,11.5l-5.6,9L22,36.5l13.5-16L29.9,11.5Zm5.45,7.75L22,14.75l2.44,4.5Zm4.9,2.15L22,29.12,19.44,21.4Zm-.68-7.74H27.6l-1.7,3.92ZM18.1,17.58l-1.7-3.92h3.83Zm-1.53,1.67H11.7l2.88-4.6Zm.7,2.15,3.38,10.24L12,21.4Zm9.34,0H32L23.33,31.67Zm.82-2.15,2-4.6,2.88,4.6Z"></path>
                        </svg>
                    </svg>

                    <span class="c-info__item--title">
      <span>Saugus apsipirkimas</span>
    </span>
                </div>
                <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">
    <span class="mr-3 mr-sm-0">

<svg class="c-icon c-info__item--icon">
  <use xlink:href="#info-phone"></use>
    <svg id="info-phone" viewBox="0 0 44 44">

      <circle class="filter-grey" cx="22" cy="22" r="22"></circle>
      <path class="filter-blue" d="M33.94,27.05l-4-3a2.58,2.58,0,0,0-1.54-.5,2.52,2.52,0,0,0-1.66.61l-2.08,1.75a.28.28,0,0,1-.19.07.32.32,0,0,1-.19-.06,21.57,21.57,0,0,1-2.89-2.52,21.66,21.66,0,0,1-2.12-2.56.31.31,0,0,1,0-.38l1.85-2.18a2.58,2.58,0,0,0,.1-3.2l-3-4A2.62,2.62,0,0,0,16.12,10a2.51,2.51,0,0,0-.9.16l-4.55,1.68a2.6,2.6,0,0,0-1.61,3,28.27,28.27,0,0,0,7.26,13.44C20.62,32.72,26.46,36,30.22,36h.1l.23,0c.14,0,.29,0,.47,0h0a2.15,2.15,0,0,0,.85-.17,2.59,2.59,0,0,0,1.37-1.46L34.84,30A2.6,2.6,0,0,0,33.94,27.05Zm-1.24,2.2-1.6,4.33a.26.26,0,0,1-.11.14H30.8a3.2,3.2,0,0,0-.48,0h0c-3.08,0-8.51-3-12.32-7a25.88,25.88,0,0,1-6.67-12.36.28.28,0,0,1,.18-.34L16,12.3a.33.33,0,0,1,.37.11l3,4a.31.31,0,0,1,0,.38L17.5,19a2.6,2.6,0,0,0-.14,3.15A23.78,23.78,0,0,0,19.71,25a22.78,22.78,0,0,0,3.2,2.78,2.52,2.52,0,0,0,1.52.5,2.57,2.57,0,0,0,1.66-.61l2.08-1.76a.3.3,0,0,1,.19-.06.32.32,0,0,1,.19.06l4,3A.32.32,0,0,1,32.7,29.25Z"></path>
    </svg>
</svg>
 </span>
                    <span class="c-info__item--title">
      <a href="tel:+370 691 31237" title="+370 691 31237">+370 691 31237</a>
    </span>
                </div>
                <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">
    <span class="mr-3 mr-sm-0">

<svg class="c-icon c-info__item--icon">
  <use xlink:href="#info-post"></use>
    <svg id="info-post" viewBox="0 0 44 44">

      <circle class="filter-grey" cx="22" cy="22" r="22"></circle>
      <path class="filter-blue" d="M10.41,18.14,6.5,19.61l3.57,2.16L17,26l4.22,6.94,2.16,3.57,1.47-3.91,7.08-18.92L33.5,9.5l-4.17,1.56Zm.71,1.9,16.63-6.22c-10.84,10.84-10,10-10.15,10.16ZM19,25.4h0c.15-.13-.7.71,10.16-10.15L23,31.88ZM30,13.16,29.84,13,30,13Z"></path>
    </svg>
</svg>
 </span>
                    <span class="c-info__item--title">
      <span>Greitas pristatymas</span>
    </span>
                </div>
            </div>


            <div id="hook_frontmodules" class="" data-asp-hook="78" data-asp-hook-name="frontModules">
                <!-- TabSlider -->

                <div data-control-hook-id="117" data-control-id="65" data-control-order="1"
                     data-control-name="TabSlider" data-control-type="Html">

                    <div class="container">
                        <ul class="nav c-panel-tabs d-flex align-items-center w-100 mt-2 mt-md-5" id="myTab"
                            role="tablist">
                            <li class="c-panel-tabs__item mr-3">
                                <a class="c-panel-tabs__item-link active px-2 py-1" data-toggle="tab" data-target="#new"
                                   title="Naujienos"><span>Naujienos</span></a>
                            </li>
                            <li class="c-panel-tabs__item mx-sm-3">
                                <a class="c-panel-tabs__item-link px-2 py-1" data-toggle="tab" data-target="#sell-off"
                                   title="Išpardavimai"><span>Išpardavimai</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="c-tab-content tab-content py-3 px-0 py-lg-4 px-xl-5 mt-3" id="myTabContent">
                        <div class="tab-pane show active px-0 px-xl-5" id="new">


                            <div id="hook_tabnew" class="" data-asp-hook="72" data-asp-hook-name="TabNew">
                                <!-- Nowosci -->

                                <div data-control-hook-id="103" data-control-id="64" data-control-order="1"
                                     data-control-name="Nowosci" data-control-type="FeaturedArticles">
                                    <div class="container mb-5">


                                        <div class="owl-carousel-custom__wrapper">
                                            <div class="owl-prev-custom  owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--prev">
  <use xlink:href="#arrow-left-slider"></use>
</svg>
</span>
                                            </div>


                                            <div
                                                class="owl-carousel owl-carousel--with-panels owl-carousel-custom owl-loaded owl-drag"
                                                data-owl="{
        'items':3,
        'responsive': {'0': {'items': 1}, '576': {'items': 2}, '992': {'items': 3}, '1280': {'items': 3}},
        'nav': false,
        'dots': false,
        'loop': true,
        'autoplay': true,
        'autoplayTimeout': 3000,
        'autoplayHoverPause': true,
        'lazyLoad': true
        }">


                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                         style="transform: translate3d(-4863px, 0px, 0px); transition: all 0.25s ease 0s; width: 9727px;">
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02008b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                                <svg id="look" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 16">
                                                                                    <path d="M11.5,16A12.43,12.43,0,0,0,22.92,8.19L23,8l-.08-.19A12.43,12.43,0,0,0,11.5,0,12.43,12.43,0,0,0,.08,7.81L0,8l.08.19A12.43,12.43,0,0,0,11.5,16Zm0-15A11.41,11.41,0,0,1,21.9,8a11.41,11.41,0,0,1-10.4,7A11.41,11.41,0,0,1,1.1,8,11.41,11.41,0,0,1,11.5,1Zm0,12a5,5,0,0,0,5.11-5A5,5,0,0,0,11.5,3,5,5,0,0,0,6.39,8,5,5,0,0,0,11.5,13Zm0-9a4,4,0,0,1,4.09,4A4.09,4.09,0,0,1,7.41,8,4,4,0,0,1,11.5,4Z"></path>
                                                                                </svg>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02008b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02008B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02008B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02008b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02008d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02008d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02008D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02008D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02008d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,24
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,71
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02009D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02009D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,43
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,59
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02010d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02010d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02010D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02010d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    11,85
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    13,16
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02011d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02011d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02011D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02011d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    6,92
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    7,68
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02012D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,58
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/slopintuvas-amortizatoriaus--a02013b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/slopintuvas-amortizatoriaus--a02013b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="SLOPINTUVAS AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02013B-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/slopintuvas-amortizatoriaus--a02013b"
                                                                   title="SLOPINTUVAS AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="SLOPINTUVAS AMORTIZATORIAUS">SLOPINTUVAS
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,67
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,08
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02013D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,58
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02014b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02014b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02014B-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02014b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    6,78
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    7,53
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02014d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02014d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02014D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02014d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    5,51
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    6,11
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02001D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02001D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,24
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,71
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02002d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02002d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02002D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02002D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02002d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    2,25
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    2,50
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02003b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02003b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02003B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02003B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02003b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,38
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    3,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02003d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02003d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02003D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02003D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02003d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,01
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    3,35
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02004D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02004D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    8,45
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    9,39
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02005D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02005D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    9,03
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    10,03
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02006b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02006b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02006B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02006B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02006b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,67
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,08
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02006d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02006d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02006D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02006D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02006d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02007b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02007b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02007B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02007B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02007b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02007D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02007D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI">
                                                                    <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI">
                                                                        AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO
                                                                        ELEMENTAI</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,94
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,48
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02008b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02008b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02008B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02008B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02008b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02008d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02008d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02008D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02008D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02008d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,24
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,71
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item active"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02009D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02009D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02009d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,43
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,59
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02010d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02010d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02010D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02010d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    11,85
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    13,16
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02011d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02011d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02011D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02011d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    6,92
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    7,68
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02012D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02012d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,58
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/slopintuvas-amortizatoriaus--a02013b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/slopintuvas-amortizatoriaus--a02013b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="SLOPINTUVAS AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02013B-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/slopintuvas-amortizatoriaus--a02013b"
                                                                   title="SLOPINTUVAS AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="SLOPINTUVAS AMORTIZATORIAUS">SLOPINTUVAS
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,67
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,08
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02013D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02013d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    10,58
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    11,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02014b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02014b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02014B-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02014b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    6,78
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    7,53
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02014d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02014d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/Assets/Themes/Kavateka/Assets/Images/blank.gif"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02014D-01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02014d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    5,51
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    6,11
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02001D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02001D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02001d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,24
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,71
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02002d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02002d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02002D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02002D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02002d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    2,25
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    2,50
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02003b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02003b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02003B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02003B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02003b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,38
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    3,75
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02003d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02003d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02003D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02003D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02003d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,01
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    3,35
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02004D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02004D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02004d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    8,45
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    9,39
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02005D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02005D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinis-tvirtinimas--a02005d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS">
                                                                        AMORTIZATORIAUS VIRŠUTINIS TVIRTINIMAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    9,03
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    10,03
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02006b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02006b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02006B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02006B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02006b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    3,67
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    4,08
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-atraminis-guolis--a02006d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-atraminis-guolis--a02006d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02006D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS ATRAMINIS GUOLIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02006D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-atraminis-guolis--a02006d"
                                                                   title="AMORTIZATORIAUS ATRAMINIS GUOLIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS ATRAMINIS GUOLIS">
                                                                        AMORTIZATORIAUS ATRAMINIS GUOLIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/apsauga-amortizatoriaus--a02007b">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/apsauga-amortizatoriaus--a02007b">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02007B-01.jpg"
                                                                                    alt="APSAUGA AMORTIZATORIAUS"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02007B-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/apsauga-amortizatoriaus--a02007b"
                                                                   title="APSAUGA AMORTIZATORIAUS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="APSAUGA AMORTIZATORIAUS">APSAUGA
                                                                        AMORTIZATORIAUS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,53
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,02
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item cloned"
                                                             style="width: 223.167px; margin-right: 20px;">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=A02007D-01.jpg"
                                                                                    alt="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI"
                                                                                    data-src="/api/media/stock-article-image?fileName=A02007D-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/amortizatoriaus-vir-utinio-tvirtinimo-elementai--a02007d"
                                                                   title="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI">
                                                                    <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO ELEMENTAI">
                                                                        AMORTIZATORIAUS VIRŠUTINIO TVIRTINIMO
                                                                        ELEMENTAI</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    4,94
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    5,48
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-nav disabled">
                                                    <button type="button" role="presentation" class="owl-prev"><span
                                                            aria-label="Previous">‹</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span
                                                            aria-label="Next">›</span></button>
                                                </div>
                                                <div class="owl-dots disabled"></div>
                                            </div>

                                            <div class="owl-next-custom owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--next">
  <use xlink:href="#arrow-right-slider"></use>
</svg>
</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Nowosci -->
                            </div>

                        </div>
                        <div class="tab-pane px-0 px-xl-5" id="sell-off">


                            <div id="hook_tabselloff" class="" data-asp-hook="74" data-asp-hook-name="TabSellOff">
                                <!-- Wyprzedaze -->

                                <div data-control-hook-id="105" data-control-id="66" data-control-order="1"
                                     data-control-name="Wyprzedaze" data-control-type="FeaturedArticles">
                                    <div class="container mb-5">


                                        <div class="owl-carousel-custom__wrapper">
                                            <div class="owl-prev-custom  owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--prev">
  <use xlink:href="#arrow-left-slider"></use>
</svg>
</span>
                                            </div>


                                            <div
                                                class="owl-carousel owl-carousel--with-panels owl-carousel-custom owl-loaded owl-drag"
                                                data-owl="{
        'items':3,
        'responsive': {'0': {'items': 1}, '576': {'items': 2}, '992': {'items': 3}, '1280': {'items': 3}},
        'nav': false,
        'dots': false,
        'loop': true,
        'autoplay': true,
        'autoplayTimeout': 3000,
        'autoplayHoverPause': true,
        'lazyLoad': true
        }">


                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/valytuv-variklis-priekis--e49010sw">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/valytuv-variklis-priekis--e49010sw">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E49010SW-01.jpg"
                                                                                    alt="VALYTUVŲ VARIKLIS PRIEKIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E49010SW-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/valytuv-variklis-priekis--e49010sw"
                                                                   title="VALYTUVŲ VARIKLIS PRIEKIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="VALYTUVŲ VARIKLIS PRIEKIS">VALYTUVŲ
                                                                        VARIKLIS PRIEKIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    98,20
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    109,12
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/priekin-s-pakabos-balkis-variklio-balkis-traversas--z13004rz">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/priekin-s-pakabos-balkis-variklio-balkis-traversas--z13004rz">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=Z13004RZ-01.jpg"
                                                                                    alt="PRIEKINĖS PAKABOS BALKIS / VARIKLIO BALKIS / TRAVERSAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=Z13004RZ-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/priekin-s-pakabos-balkis-variklio-balkis-traversas--z13004rz"
                                                                   title="PRIEKINĖS PAKABOS BALKIS / VARIKLIO BALKIS / TRAVERSAS">
                                                                    <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="PRIEKINĖS PAKABOS BALKIS / VARIKLIO BALKIS / TRAVERSAS">
                                                                        PRIEKINĖS PAKABOS BALKIS / VARIKLIO BALKIS /
                                                                        TRAVERSAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    135,54
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    150,61
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/vairo-juosta-leifas--e52001as">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/vairo-juosta-leifas--e52001as">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E52001AS-01.jpg"
                                                                                    alt="VAIRO JUOSTA / ŠLEIFAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E52001AS-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/vairo-juosta-leifas--e52001as"
                                                                   title="VAIRO JUOSTA / ŠLEIFAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="VAIRO JUOSTA / ŠLEIFAS">VAIRO JUOSTA /
                                                                        ŠLEIFAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    19,98
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    35,05
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/kuro-pylimo-vamzdis-garlavina--p88022wp">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/kuro-pylimo-vamzdis-garlavina--p88022wp">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=P88022WP-01.jpg"
                                                                                    alt="KURO ĮPYLIMO VAMZDIS / GARLAVINA"
                                                                                    data-src="/api/media/stock-article-image?fileName=P88022WP-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/kuro-pylimo-vamzdis-garlavina--p88022wp"
                                                                   title="KURO ĮPYLIMO VAMZDIS / GARLAVINA"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="KURO ĮPYLIMO VAMZDIS / GARLAVINA">KURO
                                                                        ĮPYLIMO VAMZDIS / GARLAVINA</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    64,89
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    72,10
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/varantysis-velenas-kardaninis-velenas-kardanas--n73008wn">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/varantysis-velenas-kardaninis-velenas-kardanas--n73008wn">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=N73008WN-01.jpg"
                                                                                    alt="VARANTYSIS VELENAS / KARDANINIS VELENAS / KARDANAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=N73008WN-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/varantysis-velenas-kardaninis-velenas-kardanas--n73008wn"
                                                                   title="VARANTYSIS VELENAS / KARDANINIS VELENAS / KARDANAS">
                                                                    <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="VARANTYSIS VELENAS / KARDANINIS VELENAS / KARDANAS">
                                                                        VARANTYSIS VELENAS / KARDANINIS VELENAS /
                                                                        KARDANAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    111,04
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    123,38
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/pusa-is--n22035pw">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/pusa-is--n22035pw">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=N22035PW-01.jpg"
                                                                                    alt="PUSAŠIS"
                                                                                    data-src="/api/media/stock-article-image?fileName=N22035PW-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/pusa-is--n22035pw"
                                                                   title="PUSAŠIS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="PUSAŠIS">PUSAŠIS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    93,69
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    104,10
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/reduktoriaus-varikliukas--e89000sr">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/reduktoriaus-varikliukas--e89000sr">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E89000SR-01.jpg"
                                                                                    alt="REDUKTORIAUS VARIKLIUKAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E89000SR-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/reduktoriaus-varikliukas--e89000sr"
                                                                   title="REDUKTORIAUS VARIKLIUKAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="REDUKTORIAUS VARIKLIUKAS">REDUKTORIAUS
                                                                        VARIKLIUKAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    196,07
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    217,85
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/oro-sklend-disa-vo-tuvas--e89000di">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/oro-sklend-disa-vo-tuvas--e89000di">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E89000DI-01.jpg"
                                                                                    alt="ORO SKLENDĖ / DISA VOŽTUVAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E89000DI-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/oro-sklend-disa-vo-tuvas--e89000di"
                                                                   title="ORO SKLENDĖ / DISA VOŽTUVAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="ORO SKLENDĖ / DISA VOŽTUVAS">ORO SKLENDĖ
                                                                        / DISA VOŽTUVAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    62,80
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    69,78
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/egr-vo-tuvas--e13009gr">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/egr-vo-tuvas--e13009gr">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E13009GR-01.jpg"
                                                                                    alt="EGR VOŽTUVAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E13009GR-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/egr-vo-tuvas--e13009gr"
                                                                   title="EGR VOŽTUVAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="EGR VOŽTUVAS">EGR VOŽTUVAS</h3></a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    37,27
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    46,59
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div class="c-product-slider p-3">
                                                                <div class="c-product-slider__container">


                                                                    <div
                                                                        class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                        <a class="c-btn c-btn--slider-eye u-rounded-circle text-center d-flex justify-content-center align-items-center"
                                                                           href="/stiklo-pak-l-jas--e99001ps">


                                                                            <svg class="c-icon c-icon--hover">
                                                                                <use xlink:href="#look"></use>
                                                                            </svg>

                                                                        </a>
                                                                    </div>

                                                                </div>

                                                                <div class="c-product-image">
                                                                    <div class="c-product-image__slides">
                                                                        <div class="c-product-image__slide">
                                                                            <a class="c-product-image__link"
                                                                               href="/stiklo-pak-l-jas--e99001ps">
                                                                                <img
                                                                                    class="c-product-image__image owl-lazy"
                                                                                    src="/api/media/stock-article-image?fileName=E99001PS-01.jpg"
                                                                                    alt="STIKLO PAKĖLĖJAS"
                                                                                    data-src="/api/media/stock-article-image?fileName=E99001PS-01.jpg"
                                                                                    style="opacity: 1;">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <a href="/stiklo-pak-l-jas--e99001ps"
                                                                   title="STIKLO PAKĖLĖJAS"><h3
                                                                        class="c-product__title c-product__title--light c-product__title--bilinear my-2"
                                                                        title="STIKLO PAKĖLĖJAS">STIKLO PAKĖLĖJAS</h3>
                                                                </a>
                                                                <div
                                                                    class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                                    17,16
                                                                    €
                                                                </div>
                                                                <div
                                                                    class="c-product__price-retail c-product__price-retail--sm">
                                                                    21,44
                                                                    €
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-nav disabled">
                                                    <button type="button" role="presentation" class="owl-prev"><span
                                                            aria-label="Previous">‹</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span
                                                            aria-label="Next">›</span></button>
                                                </div>
                                                <div class="owl-dots disabled"></div>
                                            </div>

                                            <div class="owl-next-custom owl-carousel-custom__icon--bg">
    <span>

<svg class="c-icon owl-carousel-custom__icon--next">
  <use xlink:href="#arrow-right-slider"></use>
</svg>
</span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Wyprzedaze -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- TabSlider -->
                <!-- Recent Posts -->

                <div data-control-hook-id="118" data-control-id="60" data-control-order="2"
                     data-control-name="Recent Posts" data-control-type="ContentWithTerm">

                    <div class="container mb-1">
                        <div class="c-panel-tabs">
      <span class="c-panel-tabs__item">
        <a class="c-panel-tabs__item-link" data-toggle="tab" data-target="#new" title="Naujausi straipsniai"><span
                class="c-headline--bordered px-2 py-1">Naujausi straipsniai</span></a>
      </span>
                        </div>
                        <div class="row d-flex align-items-start mt-5">


                        </div>

                        <div class="d-flex align-items-center justify-content-center pt-2 pt-xl-5">
                            <a class="c-btn c-btn--red text-uppercase px-sm-5 mt-3" title="Žiūrėti visus straipsnius">
                                <span>Žiūrėti visus straipsnius</span>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- Recent Posts -->
                <!-- Slider Producenci -->

                <div data-control-hook-id="119" data-control-id="16" data-control-order="3"
                     data-control-name="Slider Producenci" data-control-type="SliderSlick">


                    <div class="py-4 mt-4">
                        <div class="container">
                            <div class="c-producers p-5 border-top">
                                <div class="owl-carousel owl-loaded owl-drag"
                                     data-owl="{'items':6, 'responsive': {'0': {'items': 2}, '576': {'items': 5}, '992': {'items': 8}}, 'nav': false, 'autoplay': true, 'autoplayTimeout': 3000, 'autoplayHoverPause': true, 'lazyLoad': true}"
                                     style="height: 68px;">


                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                             style="transform: translate3d(-3660px, 0px, 0px); transition: all 0.25s ease 0s; width: 10881px;">
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fland-rover-dalys.jpg"
                                                             alt="Land Rover dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flexus-dalys.jpg"
                                                             alt="Lexus dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flincoln-dalys%20%281%29.jpg"
                                                             alt="Lincoln dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmazda-dalys.jpg"
                                                             alt="Mazda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmercedes-dalys.jpg"
                                                             alt="Mercedes Benz dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmini-dalys.jpg"
                                                             alt="MINI dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmitsubishi-dalys.jpg"
                                                             alt="Mitsubishi dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fnissan-dalys.jpg"
                                                             alt="Nissan dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fopel-dalys.jpg"
                                                             alt="Opel dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fpeugeot-dalys.jpg"
                                                             alt="Peugeot dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fpontiac-dalys.jpg"
                                                             alt="Pontiac dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fporsche-dalys.jpg"
                                                             alt="Porsche dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Frenault-dalys.jpg"
                                                             alt="Renault dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Frover-dalys.jpg"
                                                             alt="Rover dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsaab-dalys.jpg"
                                                             alt="Saab dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsaturn-dalys.jpg"
                                                             alt="Saturn dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fscion-dalys.jpg"
                                                             alt="Scion dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fseat-dalys.jpg"
                                                             alt="Seat dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fskoda-dalys.jpg"
                                                             alt="Skoda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsmart-dalys.jpg"
                                                             alt="Smart dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsubaru-dalys.jpg"
                                                             alt="Subaru dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsuzuki-dalys.jpg"
                                                             alt="Suzuki dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ftesla-dalys.jpg"
                                                             alt="Tesla dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ftoyota-dalys.jpg"
                                                             alt="Toyota dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvauxhall-dalys.jpg"
                                                             alt="Vauxhall dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvolkswagen-dalys.jpg"
                                                             alt="Volkswagen dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvolvo-dalys.jpg"
                                                             alt="Volvo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Facura-dalys.jpg"
                                                             alt="Acura dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Facura-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Falfa-romeo-dalys.jpg"
                                                             alt="Alfa Romeo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Falfa-romeo-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Faudi-dalys.jpg"
                                                             alt="Audi dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Faudi-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbentley200-1539681183.png"
                                                             alt="Bentley dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbentley200-1539681183.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbmw-dalys.jpg"
                                                             alt="BMW dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbmw-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcadillac-dalys.jpg"
                                                             alt="Cadillac dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcadillac-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchevrolet-dalys.jpg"
                                                             alt="Chevrolet dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchevrolet-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchrysler-dalys.jpg"
                                                             alt="Chrysler dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchrysler-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcitroen-dalys.jpg"
                                                             alt="Citroen dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcitroen-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaewoo-dalys.jpg"
                                                             alt="Daewoo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaewoo-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaihatsu-dalys.jpg"
                                                             alt="Daihatsu dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaihatsu-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdodge-dalys.jpg"
                                                             alt="Dodge dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdodge-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ffiat-dalys.jpg"
                                                             alt="Fiat dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ffiat-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fford-dalys.jpg"
                                                             alt="Ford dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fford-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FGMC-logo.png"
                                                             alt="GMC dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FGMC-logo.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FAUT-HUM-01__42828.1315547652.1280.1280.jpg"
                                                             alt="Hummer dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FAUT-HUM-01__42828.1315547652.1280.1280.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhyundai-dalys.jpg"
                                                             alt="Hyundai dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhyundai-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhonda-dalys.jpg"
                                                             alt="Honda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Finfiniti-dalys%20%281%29.jpg"
                                                             alt="Infiniti dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fisuzu-dalys%20%281%29.jpg"
                                                             alt="Isuzu dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fiveco-dalys.jpg"
                                                             alt="Iveco dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fjaguar-dalys.jpg"
                                                             alt="Jaguar dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fjeep-dalys.jpg"
                                                             alt="Jeep dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fkia-dalys.jpg"
                                                             alt="KIA dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flada-dalys.jpg"
                                                             alt="Lada dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flancia-dalys.jpg"
                                                             alt="Lancia dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fland-rover-dalys.jpg"
                                                             alt="Land Rover dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flexus-dalys.jpg"
                                                             alt="Lexus dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flincoln-dalys%20%281%29.jpg"
                                                             alt="Lincoln dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmazda-dalys.jpg"
                                                             alt="Mazda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmercedes-dalys.jpg"
                                                             alt="Mercedes Benz dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmini-dalys.jpg"
                                                             alt="MINI dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fmitsubishi-dalys.jpg"
                                                             alt="Mitsubishi dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fnissan-dalys.jpg"
                                                             alt="Nissan dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fopel-dalys.jpg"
                                                             alt="Opel dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fpeugeot-dalys.jpg"
                                                             alt="Peugeot dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fpontiac-dalys.jpg"
                                                             alt="Pontiac dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fporsche-dalys.jpg"
                                                             alt="Porsche dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Frenault-dalys.jpg"
                                                             alt="Renault dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Frover-dalys.jpg"
                                                             alt="Rover dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsaab-dalys.jpg"
                                                             alt="Saab dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsaturn-dalys.jpg"
                                                             alt="Saturn dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fscion-dalys.jpg"
                                                             alt="Scion dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fseat-dalys.jpg"
                                                             alt="Seat dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fskoda-dalys.jpg"
                                                             alt="Skoda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsmart-dalys.jpg"
                                                             alt="Smart dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsubaru-dalys.jpg"
                                                             alt="Subaru dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fsuzuki-dalys.jpg"
                                                             alt="Suzuki dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ftesla-dalys.jpg"
                                                             alt="Tesla dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ftoyota-dalys.jpg"
                                                             alt="Toyota dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvauxhall-dalys.jpg"
                                                             alt="Vauxhall dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvolkswagen-dalys.jpg"
                                                             alt="Volkswagen dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fvolvo-dalys.jpg"
                                                             alt="Volvo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Facura-dalys.jpg"
                                                             alt="Acura dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Facura-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Falfa-romeo-dalys.jpg"
                                                             alt="Alfa Romeo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Falfa-romeo-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Faudi-dalys.jpg"
                                                             alt="Audi dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Faudi-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbentley200-1539681183.png"
                                                             alt="Bentley dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbentley200-1539681183.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbmw-dalys.jpg"
                                                             alt="BMW dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fbmw-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcadillac-dalys.jpg"
                                                             alt="Cadillac dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcadillac-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchevrolet-dalys.jpg"
                                                             alt="Chevrolet dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchevrolet-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchrysler-dalys.jpg"
                                                             alt="Chrysler dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fchrysler-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcitroen-dalys.jpg"
                                                             alt="Citroen dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fcitroen-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaewoo-dalys.jpg"
                                                             alt="Daewoo dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaewoo-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaihatsu-dalys.jpg"
                                                             alt="Daihatsu dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdaihatsu-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdodge-dalys.jpg"
                                                             alt="Dodge dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fdodge-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ffiat-dalys.jpg"
                                                             alt="Fiat dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Ffiat-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fford-dalys.jpg"
                                                             alt="Ford dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fford-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FGMC-logo.png"
                                                             alt="GMC dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FGMC-logo.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FAUT-HUM-01__42828.1315547652.1280.1280.jpg"
                                                             alt="Hummer dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2FAUT-HUM-01__42828.1315547652.1280.1280.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhyundai-dalys.jpg"
                                                             alt="Hyundai dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px; opacity: 1;"
                                                             src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhyundai-dalys.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fhonda-dalys.jpg"
                                                             alt="Honda dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Finfiniti-dalys%20%281%29.jpg"
                                                             alt="Infiniti dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fisuzu-dalys%20%281%29.jpg"
                                                             alt="Isuzu dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fiveco-dalys.jpg"
                                                             alt="Iveco dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fjaguar-dalys.jpg"
                                                             alt="Jaguar dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fjeep-dalys.jpg"
                                                             alt="Jeep dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fkia-dalys.jpg"
                                                             alt="KIA dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flada-dalys.jpg"
                                                             alt="Lada dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Flancia-dalys.jpg"
                                                             alt="Lancia dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-item cloned" style="width: 81.688px; margin-right: 20px;">
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 68px;">
                                                    <div>
                                                        <img class="owl-lazy"
                                                             data-src="api/media/FileSystemMediaConfiguration?filename=Pictures%2Fland-rover-dalys.jpg"
                                                             alt="Land Rover dalys"
                                                             style="width: auto; max-width: 100%; height: auto; max-height: 68px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled">
                                        <button type="button" role="presentation" class="owl-prev"><span
                                                aria-label="Previous">‹</span></button>
                                        <button type="button" role="presentation" class="owl-next"><span
                                                aria-label="Next">›</span></button>
                                    </div>
                                    <div class="owl-dots">
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot active"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                        <button role="button" class="owl-dot"><span></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Producenci -->
            </div>

        </div>
    </div>
@endsection
