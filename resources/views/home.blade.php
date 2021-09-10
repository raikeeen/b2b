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
                <hr  class="border-bottom-blue">
            </div>
            <div class="body d-none d-lg-block">
                <li class="cat-menu-item border-bottom mx-2 mb-3 pb-2 pl-1">
                    <div class="">
                        <a class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO0&amp;segment1=amortizavimo-sistema" title="AMORTIZAVIMO SISTEMA">
                            <span class="c-category-menu__name mr-1"> AMORTIZAVIMO SISTEMA</span>
                            <svg class="cat-icon-red">
                                <use xlink:href="#category-show">
                                    <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                        <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>
                                    </svg>
                                </use>
                            </svg>
                            <svg class="cat-icon-blue">
                                <use xlink:href="#category-hide">
                                    <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.5 10.5">
                                        <path d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                    </svg>
                                </use>
                            </svg>
                        </a>
                        <ul class="c-category-menu__children dropdown-menu px-3 dropdown-transform" id="category-drop">
                            <li class="c-category-menu__children__item py-2 text-left">
                                <a class="c-category-menu__children__link" id="category-item" href="" title="AMORT. MONTAVIMO ELEMENTAI">AMORT. MONTAVIMO ELEMENTAI</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </div>
        </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row">
                <div>
                    <a href="/">
                        <img src="{{asset('/storage/banners/banner.jpg')}}" alt="" style="width: 100%;">
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">
                        <svg class="c-icon c-info__item--icon">
                            <use xlink:href="#info-shopping">
                                <svg id="info-shopping" viewBox="0 0 44 44">
                                    <circle class="cls-1" cx="22" cy="22" r="22"></circle>
                                    <path class="cls-2" d="M14.1,11.5l-5.6,9L22,36.5l13.5-16L29.9,11.5Zm5.45,7.75L22,14.75l2.44,4.5Zm4.9,2.15L22,29.12,19.44,21.4Zm-.68-7.74H27.6l-1.7,3.92ZM18.1,17.58l-1.7-3.92h3.83Zm-1.53,1.67H11.7l2.88-4.6Zm.7,2.15,3.38,10.24L12,21.4Zm9.34,0H32L23.33,31.67Zm.82-2.15,2-4.6,2.88,4.6Z"></path>
                                </svg>
                            </use>
                        </svg>

                        <span class="c-info__item--title">
                            <span>Saugus apsipirkimas</span>
                        </span>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">
                        <svg class="c-icon c-info__item--icon">
                            <use xlink:href="#info-shopping">
                                <svg id="info-shopping" viewBox="0 0 44 44">
                                    <circle class="cls-1" cx="22" cy="22" r="22"></circle>
                                    <path class="cls-2" d="M14.1,11.5l-5.6,9L22,36.5l13.5-16L29.9,11.5Zm5.45,7.75L22,14.75l2.44,4.5Zm4.9,2.15L22,29.12,19.44,21.4Zm-.68-7.74H27.6l-1.7,3.92ZM18.1,17.58l-1.7-3.92h3.83Zm-1.53,1.67H11.7l2.88-4.6Zm.7,2.15,3.38,10.24L12,21.4Zm9.34,0H32L23.33,31.67Zm.82-2.15,2-4.6,2.88,4.6Z"></path>
                                </svg>
                            </use>
                        </svg>

                        <span class="c-info__item--title">
                            <span>Saugus apsipirkimas</span>
                        </span>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="c-info__item col-12 col-sm-4 d-flex justify-content-center align-items-center">
                        <svg class="c-icon c-info__item--icon">
                            <use xlink:href="#info-shopping">
                                <svg id="info-shopping" viewBox="0 0 44 44">
                                    <circle class="cls-1" cx="22" cy="22" r="22"></circle>
                                    <path class="cls-2" d="M14.1,11.5l-5.6,9L22,36.5l13.5-16L29.9,11.5Zm5.45,7.75L22,14.75l2.44,4.5Zm4.9,2.15L22,29.12,19.44,21.4Zm-.68-7.74H27.6l-1.7,3.92ZM18.1,17.58l-1.7-3.92h3.83Zm-1.53,1.67H11.7l2.88-4.6Zm.7,2.15,3.38,10.24L12,21.4Zm9.34,0H32L23.33,31.67Zm.82-2.15,2-4.6,2.88,4.6Z"></path>
                                </svg>
                            </use>
                        </svg>

                        <span class="c-info__item--title">
                            <span>Saugus apsipirkimas</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
