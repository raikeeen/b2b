
<header class="background-f5f5f5">
    <div class="container ddd">
        <div class="row">
            <div class="d-flex col-12 d-sm-none d-xl-flex col-xl-3 justify-content-center align-items-center mt-2 mt-xl-0">
                <a href="https://www.rm-autodalys.eu/">
                    <img src="https://www.rm-autodalys.eu/Assets/Themes/Kavateka/Assets/Images/logo.png" alt="RM AUTOMOTIVE AUTO SPARE PARTS SHOP" class="c-page-header__logo">
                </a>
            </div>
            <div class="col-12 col-xl-9">
                <div class="row" style="flex-wrap: unset;">
                    <div class="col-8 col-xl-8 d-flex justify-content-center align-items-center search-center">
                        <input class="input main-search" type="text" placeholder="Ieškokite produkto pavadinimo ar kodo">
                        <button class="search-button" type="submit">
                            <svg class="icon-search" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19,15.14A10.15,10.15,0,0,0,3,3,10.15,10.15,0,0,0,15.14,19l4.16,4.16a2.87,2.87,0,0,0,2,.86h0A2.3,2.3,0,0,0,23,23.33l.39-.38a2.61,2.61,0,0,0-.19-3.65Zm-14.47.64A8,8,0,0,1,10.15,2.17a8,8,0,0,1,8,8,8,8,0,0,1-2.33,5.64h0a8,8,0,0,1-11.27,0ZM21.8,21.41l-.38.39a.19.19,0,0,1-.12,0,.71.71,0,0,1-.46-.22l-3.9-3.91.38-.38h0l.38-.38,3.91,3.91C21.85,21.08,21.86,21.36,21.8,21.41Z"></path>
                                <use xlink:href="#search"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div   class="row justify-content-around">
                            <div class="col-3 col-xl-3 order-2 order-sm-1 order-xl-2">
                                <div class="row">
                                    <div class="text-icon-header col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center flex-column px-0 px-3">
                                        <a href="https://www.rm-autodalys.eu/nowosci" class="text-decoration-none text-center-webkit" title="NAUJIENOS">
                                            <div class="icon-header">
                                                <svg class="icon-insade">
                                                    <use xlink:href="#news"></use>
                                                    <svg id="news" viewBox="0 0 29 28">
                                                        <path d="M14.5,0,10,9.22,0,10.69l7.25,7.18L5.54,28l9-4.78,9,4.78L21.75,17.87,29,10.69,19,9.22Zm4.93,17.11L20.6,24l-6.1-3.26L8.4,24l1.17-6.89L4.63,12.22l6.82-1L14.5,5l3.05,6.27,6.82,1Z"></path>
                                                    </svg>
                                                </svg>

                                            </div>
                                            <span class="d-none d-md-block">NAUJIENOS</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-xl-3 order-2 order-sm-1 order-xl-2">
                                <div class="row" style="float: right">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-center-webkit text-decoration-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="text-icon-header col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center flex-column px-0 px-3">
                                                <div class="dropdown align-items-center">
                                                    <div class="icon-header">
                                                        <svg class="icon-insade" style="align-items: center !important;">
                                                            <use xlink:href="#log-out"></use>
                                                            <svg class="" id="log-out" viewBox="0 0 25 26">
                                                                <path d="M2.42,26H22.58A2.47,2.47,0,0,0,25,23.52V19.15a3.52,3.52,0,0,0-2.49-3.39l-1.63-.49A28.85,28.85,0,0,0,12.45,14a28.27,28.27,0,0,0-8.27,1.23l-1.72.52A3.52,3.52,0,0,0,0,19.15v4.37A2.47,2.47,0,0,0,2.42,26Zm-.27-6.85a1.35,1.35,0,0,1,.94-1.28l1.71-.52a26.16,26.16,0,0,1,7.65-1.14,26.74,26.74,0,0,1,7.84,1.17l1.62.49a1.33,1.33,0,0,1,.94,1.28v4.37a.28.28,0,0,1-.27.28H2.42a.28.28,0,0,1-.27-.28ZM12.5,13A6.52,6.52,0,1,0,6.06,6.46,6.49,6.49,0,0,0,12.5,13Zm0-10.83A4.32,4.32,0,1,1,8.23,6.46,4.3,4.3,0,0,1,12.5,2.15Z"></path>
                                                            </svg>
                                                        </svg>

                                                    </div>
                                                    <span class="dropdown-toggle d-none d-md-block">PASKYRA</span>
                                                </div>
                                            </div>
                                        </a>
                                        @guest
                                        @else
                                        <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton" style="min-width: 300px">
                                                    <span class="c-dropdown-menu__user dropdown-item font-weight-bold">
                                                        {{ Auth::user()->name }}
                                                    </span>
                                                    <hr class="border-bottom-blue">
                                                    <a class="dropdown-item my-3" href="" title="Mokėjimai">
                                                        <span>Mokėjimai</span>
                                                    </a>
                                                    <a class="dropdown-item" href="" title="Dokumentai">
                                                        <span>Dokumentai</span>
                                                    </a>
                                                    <a class="dropdown-item mt-3" href="" title="Atidaryti užsakymai">
                                                        <span>Atidaryti užsakymai</span>
                                                    </a>
                                                    <a class="dropdown-item mt-3" href="" title="Užsakymai uždaryti">
                                                        <span>Užsakymai uždaryti</span>
                                                    </a>
                                                    <a class="dropdown-item mt-3" href="" title="Grąžinimas">
                                                        <span>Grąžinimas</span>
                                                    </a>
                                                    <a class="dropdown-item mt-3" href="" title="Redaguoti paskyrą">
                                                        <span>Redaguoti paskyrą</span>
                                                    </a>
                                                    <a class="dropdown-item mt-3" href="" title="Pakeisti slaptažodį">
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
                                                    <script>

                                                    </script>

                                        </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>

                            <div class="col-3 col-xl-3 order-2 order-sm-1 order-xl-2">

                                <div >
                                    <div class="text-icon-header col col-xl-3 ml-xl-auto d-flex justify-content-center align-items-center flex-column px-0 px-3">
                                        <a class="text-center-webkit d-block" data-count="0" href="https://www.rm-autodalys.eu/koszyk" >
                                            <div class="icon-header">
                                                <svg class="icon-insade">
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
                            </div>

                        </div>



                    </div></div>
            </div>
        </div>
    </div>
    </div>
</header>

