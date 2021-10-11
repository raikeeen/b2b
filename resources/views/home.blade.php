@extends('welcome')

@section('title','Automobilių dalys')
@section('content')
    {{ Breadcrumbs::render('home') }}

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
                                                        <use xlink:href="#arrow-left-slider">
                                                            <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                                                <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
                                                            </svg>
                                                        </use>
                                                    </svg>
                                                </span>
                                            </div>


                                            <div id="owl-newProduct" class="" data-owl="{'items':3,
        'responsive': {'0': {'items': 1}, '576': {'items': 2}, '992': {'items': 3}, '1280': {'items': 3}},
        'nav': false,
        'dots': false,
        'loop': true,
        'autoplay': true,
        'autoplayTimeout': 3000,
        'autoplayHoverPause': true,
        'lazyLoad': true
        }" style="width: 100%;overflow: hidden;">
                                                @foreach($newProducts as $newProduct)
                                                    <div class="item c-product-slider p-3" style="width: 18rem; z-index: 100">
                                                        <div class="c-product-image">
                                                            <div class="c-product-image__slides">
                                                                <div class="c-product-image__slide">
                                                                    <a class="c-product-image__link" href="{{asset('storage/images/no_photo_200.jpg')}}">
                                                                        <img class="c-product-image__image owl-lazy" src="{{asset('storage/images/no_photo_200.jpg')}}" alt="" style="opacity: 1;">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="https://www.rm-autodalys.eu/apsauga-amortizatoriaus--a02007b" title="APSAUGA AMORTIZATORIAUS">
                                                            <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2" title="APSAUGA AMORTIZATORIAUS">{{$newProduct->name}}</h3>
                                                        </a>
                                                        <div class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                            {{$newProduct->price}} €
                                                        </div>
                                                        <div class="c-product__price-retail c-product__price-retail--sm">
                                                            {{$newProduct->price * 1.21}} €
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>



                                            <div class="owl-next-custom owl-carousel-custom__icon--bg"><span><svg class="c-icon owl-carousel-custom__icon--next"><use xlink:href="#arrow-right-slider"></use></svg></span></div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Nowosci -->
                            </div>

                        </div>
                        <div class="tab-pane px-0 px-xl-5" id="sell-off">
                            {{-- Распродан --}}
                            <div class="container mb-5">


                                <div class="owl-carousel-custom__wrapper">

                            <div class="owl-prev-custom  owl-carousel-custom__icon--bg">
                                                <span>
                                                    <svg class="c-icon owl-carousel-custom__icon--prev">
                                                        <use xlink:href="#arrow-left-slider">
                                                            <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                                                <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
                                                            </svg>
                                                        </use>
                                                    </svg>
                                                </span>
                            </div>
                            <div id="owl-soldProduct" style="width: 100%;overflow: hidden;">
                                @foreach($soldProducts as $newProduct)
                                <div class="item c-product-slider p-3" style="width: 18rem; z-index: 1000">
                                    <div class="c-product-image">
                                        <div class="c-product-image__slides">
                                            <div class="c-product-image__slide">
                                                <a class="c-product-image__link" href="{{asset('storage/images/no_photo_200.jpg')}}">
                                                    <img class="c-product-image__image owl-lazy" src="{{asset('storage/images/no_photo_200.jpg')}}" alt="" style="opacity: 1;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                        <a href="https://www.rm-autodalys.eu/apsauga-amortizatoriaus--a02007b" title="APSAUGA AMORTIZATORIAUS">
                                            <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2" title="APSAUGA AMORTIZATORIAUS">{{$newProduct->name}}</h3>
                                        </a>
                                        <div class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                            {{$newProduct->price}} €
                                        </div>
                                        <div class="c-product__price-retail c-product__price-retail--sm">
                                            {{$newProduct->price * 1.21}} €
                                        </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="owl-next-custom owl-carousel-custom__icon--bg"><span><svg class="c-icon owl-carousel-custom__icon--next"><use xlink:href="#arrow-right-slider"></use></svg></span></div>

                                </div></div>
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
                                <a class="c-panel-tabs__item-link" data-toggle="tab" data-target="#new" title="Naujausi straipsniai">
                                    <span class="c-headline--bordered px-2 py-1">Naujausi straipsniai</span></a>
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

                <div data-control-hook-id="119" data-control-id="16" data-control-order="3"
                     data-control-name="Slider Producenci" data-control-type="SliderSlick">


                    <div class="py-4 mt-4">
                        <div class="container">
                            <div class="c-producers p-5 border-top" style="width: 100%;overflow: hidden;">
                                <div id="owl-brand">
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>
                                    <div class="item"><img src="{{asset('storage/images/no_photo_200.jpg')}}" alt="Owl Image"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Producenci -->
            </div>
            <style>
                #owl-demo .item{
                    margin: 3px;
                }
                #owl-demo .item img{
                    display: block;
                    width: 100%;
                    height: auto;
                }
            </style>
        </div>
    </div>

@endsection
