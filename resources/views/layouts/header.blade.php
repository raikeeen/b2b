
<header class="c-page-header c-page-header--sticky">
    <div class="container ddd">
<div class="row">
    <div class="d-flex col-12 d-sm-none d-xl-flex col-xl-3 justify-content-center align-items-center c-page-header__logo-col mt-2 mt-xl-0">
        <a href="{{url('/')}}">
            <img src="{{asset('storage/images/logo.png')}}" alt="RM AUTOMOTIVE AUTO SPARE PARTS SHOP" class="c-page-header__logo">
        </a>
    </div>

    <div class="col-12 col-xl-9">
        <div class="row c-page-header__inner py-2 d-flex flex-column flex-xl-row justify-content-between align-items-center no-gutters">
            <div class="col-12 col-xl-8 col-sm-12 d-flex justify-content-center align-items-center my-2 my-xl-0 order-1 order-sm-2 order-xl-1">

                <div id="app">
                    @guest
                        <div class="" data-asp-hook-name="HeaderQuickSearch">
                            <div data-control-type="QuickSearch">
                                <div class="c-quick-search position-relative" @keyup.enter="submit()">

                                    <input class="c-input c-input--quicksearch" placeholder="Ieškokite produkto pavadinimo ar kodo"   required="">

                                    <button class="c-quick-search__button" type="submit">
                                        <svg class="c-icon">
                                            <use xlink:href="#search"></use>
                                            <path d="M19,15.14A10.15,10.15,0,0,0,3,3,10.15,10.15,0,0,0,15.14,19l4.16,4.16a2.87,2.87,0,0,0,2,.86h0A2.3,2.3,0,0,0,23,23.33l.39-.38a2.61,2.61,0,0,0-.19-3.65Zm-14.47.64A8,8,0,0,1,10.15,2.17a8,8,0,0,1,8,8,8,8,0,0,1-2.33,5.64h0a8,8,0,0,1-11.27,0ZM21.8,21.41l-.38.39a.19.19,0,0,1-.12,0,.71.71,0,0,1-.46-.22l-3.9-3.91.38-.38h0l.38-.38,3.91,3.91C21.85,21.08,21.86,21.36,21.8,21.41Z"></path>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        </div>
                    @else
                    <search :user={{Auth::id()}}></search>
                    @endguest
                </div>

            </div>
            <div class="col-12 col-xl-4 order-2 order-sm-1 order-xl-2">
                <div class="row no-gutters">

                    <div class="d-none d-sm-flex col-sm-5 col-md-3 d-xl-none justify-content-center align-items-center c-page-header__logo-col mt-2 mt-xl-0">
                        <a href="{{url('/')}}">
                            <img src="{{asset('storage/images/logo.png')}}" alt="RM AUTOMOTIVE AUTO SPARE PARTS SHOP" class="c-page-header__logo">
                        </a>
                    </div>

                    <div class="col-12 col-sm-7 col-md-9 col-xl-12">
                        <div class="row">
                            <div class="c-page-header__item col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center flex-column px-0 px-3">
                                <a href="{{route('product.new')}}" class="text-decoration-none" title="NAUJIENOS">
                                    <div class="c-page-header__item__icon--bg">


                                        <svg class="c-icon c-page-header__item__icon">
                                            <use xlink:href="#news"></use>
                                            <svg id="news" viewBox="0 0 29 28">
                                                <path d="M14.5,0,10,9.22,0,10.69l7.25,7.18L5.54,28l9-4.78,9,4.78L21.75,17.87,29,10.69,19,9.22Zm4.93,17.11L20.6,24l-6.1-3.26L8.4,24l1.17-6.89L4.63,12.22l6.82-1L14.5,5l3.05,6.27,6.82,1Z"></path>
                                            </svg>
                                        </svg>

                                    </div>
                                    <span class="d-none d-md-block">NAUJIENOS</span>
                                </a>
                            </div>
                            <div class="c-page-header__item col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center flex-column px-0 px-3">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-center-webkit text-decoration-none" id="dropdownMenuButton" data-toggle="dropdown" >
                                        <div class="c-page-header__item__icon--bg">
                                            <svg class="c-icon c-page-header__item__icon">
                                                @guest
                                                <use xlink:href="#log-out"></use>
                                                    <svg class="" id="log-out" viewBox="0 0 25 26">
                                                    <path d="M2.42,26H22.58A2.47,2.47,0,0,0,25,23.52V19.15a3.52,3.52,0,0,0-2.49-3.39l-1.63-.49A28.85,28.85,0,0,0,12.45,14a28.27,28.27,0,0,0-8.27,1.23l-1.72.52A3.52,3.52,0,0,0,0,19.15v4.37A2.47,2.47,0,0,0,2.42,26Zm-.27-6.85a1.35,1.35,0,0,1,.94-1.28l1.71-.52a26.16,26.16,0,0,1,7.65-1.14,26.74,26.74,0,0,1,7.84,1.17l1.62.49a1.33,1.33,0,0,1,.94,1.28v4.37a.28.28,0,0,1-.27.28H2.42a.28.28,0,0,1-.27-.28ZM12.5,13A6.52,6.52,0,1,0,6.06,6.46,6.49,6.49,0,0,0,12.5,13Zm0-10.83A4.32,4.32,0,1,1,8.23,6.46,4.3,4.3,0,0,1,12.5,2.15Z"></path>
                                                    </svg>
                                                @else
                                                    <use xlink:href="#log-in"></use>
                                                    <svg id="log-in" viewBox="0 0 27.54 26.06">
                                                        <path d="M19.91,24.77l-1.28,1.29h0l-1.69-1.72-4-4,2.1-2.13,3.58,3.62,3.67-3.71h0l1.24-1.25,1.89-1.92L26.49,16l1.05,1.06-4.46,4.5ZM6.09,6.52A6.45,6.45,0,1,1,12.54,13,6.49,6.49,0,0,1,6.09,6.52Zm2.18,0A4.27,4.27,0,1,0,12.54,2.2,4.3,4.3,0,0,0,8.27,6.52ZM22.63,26.06a2.47,2.47,0,0,0,2.45-2.48V22.05l-4,4ZM2.45,23.85a.27.27,0,0,1-.27-.27V19.21a1.33,1.33,0,0,1,.94-1.28l1.71-.52a26.24,26.24,0,0,1,7.66-1.15c.64,0,1.27,0,1.91.07l.65-.66.8.81a27.47,27.47,0,0,1,4.48.95l.11,0,1.74-1.76L21,15.32a29.3,29.3,0,0,0-8.47-1.26A28.35,28.35,0,0,0,4.21,15.3l-1.72.52A3.5,3.5,0,0,0,0,19.21v4.37a2.47,2.47,0,0,0,2.45,2.48h13.7L14,23.85Z"></path>
                                                    </svg>
                                            </svg>
                                            @endguest

                                        </div>

                                    <ul class="c-top-bar__nav-items">
                                        <li class="c-top-bar__nav-item">
                                            <div class="c-top-bar__nav-link dropdown-toggle" title="PASKYRA">
                                                <span class="d-none d-md-block">PASKYRA</span>
                                            </div>
                                        </li>
                                    </ul>
                                    </a>

                                        @guest
                                        @else
                                            <div class="transform dropdown-menu p-3" style="min-width: 300px;">
                                                    <span class="c-dropdown-menu__user dropdown-item font-weight-bold">
                                                       {{ Auth::user()->address->company_name}}
                                                    </span>
                                                <hr class="border-bottom-blue">
                                                <a class="dropdown-item" href="{{route('documents.index')}}" title="Dokumentai">
                                                    <span>Mokėjimai</span>
                                                </a>
                                                <a class="dropdown-item mt-3" href="{{route('orders.index')}}" title="Užsakymai uždaryti">
                                                    <span>Užsakymai</span>
                                                </a>
                                                <a class="dropdown-item mt-3" href="{{route('refunds')}}" title="Grąžinimas">
                                                    <span>Grąžinimai</span>
                                                </a>
                                                <a class="dropdown-item mt-3" href="{{route('profile.show')}}" title="Redaguoti paskyrą">
                                                    <span>Redaguoti paskyrą</span>
                                                </a>
                                                <a class="dropdown-item mt-3" href="{{route('password-reset')}}" title="Pakeisti slaptažodį">
                                                    <span>Pakeisti slaptažodį</span>
                                                </a>

                                                <div class="dropdown-item" aria-labelledby="navbarDropdown" style="padding-left: 0rem;margin-top: 1rem!important;">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Atsijungti') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        @endguest
                            </div>
                            </div>
                            <div class="c-page-header__item col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center px-0 px-3">


                                <div class="" data-asp-hook-name="HeaderShoppingCart">

                                    <div data-control-hook-id="111" data-control-id="6" data-control-order="1" data-control-name="Widget koszyka" data-control-type="ShoppingCartStatus">


                                        <div data-control-type="ShoppingCartWidget">
                                            <a class="c-shopping-cart-status text-center d-block" data-count="@if (Cart::instance('default')->count() > 0) {{Cart::instance('default')->count()}}@else 0 @endif" data-bind="" href="{{route('cart.index')}}" title="Krepšelis">
                                                <div class="c-page-header__item__icon--bg mb-0 mt-sm-2 mt-md-0 mb-md-2">


                                                    <svg class="c-icon c-page-header__item__icon">
                                                        <use xlink:href="#shoppingcart"></use>

                                                        <svg id="shoppingcart" viewBox="0 0 30 25">
                                                            <path d="M15.9,22.13A2.83,2.83,0,1,0,13.08,25,2.85,2.85,0,0,0,15.9,22.13Zm-3.57,0a.76.76,0,0,1,.75-.76.76.76,0,1,1-.75.76Zm11,2.87a2.87,2.87,0,1,0-2.83-2.87A2.85,2.85,0,0,0,23.29,25Zm0-3.63a.76.76,0,1,1-.74.76A.75.75,0,0,1,23.29,21.37ZM29.12,1.6H10A.86.86,0,0,0,9.3,2a.93.93,0,0,0-.11.81l3.6,10.3a.88.88,0,0,0,.83.6h11.7a1.31,1.31,0,0,0,1.24-.9L30,2.79A.93.93,0,0,0,29.84,2,.89.89,0,0,0,29.12,1.6Zm-4.35,10H14.47L11.73,3.72h15.7ZM4.34,2.12H1A1.06,1.06,0,0,1,0,1.06,1.05,1.05,0,0,1,1,0H5.83l5.26,15.59H26.23a1.06,1.06,0,0,1,0,2.11H9.6Z"></path>
                                                        </svg>

                                                    </svg>

                                                </div>
                                                <span class="d-none d-sm-inline-block text-uppercase ml-1">
      <span class="d-none d-md-block">Krepšelis</span>
    </span>
                                            </a>
                                        </div>

                                    </div>
                                    <!-- Widget koszyka -->
                                </div>

                            </div>
                            <div class="c-page-header__item col-auto ml-xl-auto px-0 px-3">
                                <div class="d-flex flex-md-column justify-content-center align-items-center">
                                    <div class="order-1 order-md-0 ml-2 ml-sm-0 mt-1 mt-sm-0">


                                        <div id="hook_languageselector" class="  " data-asp-hook="69" data-asp-hook-name="languageSelector">


                                            <div data-control-type="LanguageSelector">


                                                <div class="c-lang-selector dropdown">
                                                    <button class="c-lang-selector__btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                                        <svg class="c-icon c-icon-language">
                                                            <use xlink:href="#lt-LT"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="c-lang-selector__link d-flex justify-content-between align-items-center dropdown-item my-2" href="#" title="LITHUANIAN">
                                                            <div>LITHUANIAN</div>
                                                            <div class="ml-2">


                                                                <svg class="c-icon c-icon-language">
                                                                    <use xlink:href="#lt-LT"></use>
                                                                    <svg id="lt-LT" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 28 28"><g class="cls-6"><g data-name="Layer 1">
                                                                                <path class="cls-7" d="M0,14a14.1,14.1,0,0,0,.73,4.47H27.27a14.05,14.05,0,0,0,0-8.94H.73A14.1,14.1,0,0,0,0,14Z"></path><path class="cls-8" d="M.73,9.53H27.27a14,14,0,0,0-26.54,0Z"></path><path class="cls-9" d="M14,28a14,14,0,0,0,13.27-9.53H.73A14,14,0,0,0,14,28Z"></path><path class="cls-10" d="M14,28A14,14,0,1,0,0,14,14,14,0,0,0,14,28ZM14,.6A13.4,13.4,0,1,1,.6,14,13.4,13.4,0,0,1,14,.6Z"></path></g></g>
                                                                    </svg>
                                                                </svg>

                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-3">
                                        <a href="https://www.facebook.com/AutoSparePartsAndAccesoriesRMautomotive/" target="_blank">


                                            <svg class="c-icon c-icon--fb">
                                                <use xlink:href="#fb"></use>
                                                <circle cx="14" cy="14" r="14" fill="#fff"></circle>
                                                <path class="cls-2" d="M17.83,8.44s-1.4-.22-1.63-.22S15,8.35,15,9.17v2.14h2.9l-.27,2.63L15,14v8.63H11.48V14l-1.76-.05,0-2.68h1.77c0-1.06-.32-4,1.12-5.09,2-1.47,5.63-.45,5.63-.45Z"></path>
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</header>
