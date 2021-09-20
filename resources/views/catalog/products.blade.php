@extends('welcome')

@section('title','Catalog')
@section('content')
    <div class="row">


        <div class="col-12">
        </div>

        <div class="col-12 col-lg-3">
            <div class="c-filter__show u-bd-secondary mb-3 d-flex justify-content-between align-items-center">
                <span class="c-headline c-headline--semi-light-toggle pl-2 py-1 mb-0">Filtrai</span>
                <span class="d-lg-none pr-2">


<svg class="c-icon c-icon--filter">
  <use xlink:href="#category-show"></use>
</svg>



<svg class="c-icon c-icon--filter-blue">
  <use xlink:href="#category-hide"></use>
</svg>

          </span>
            </div>
            <div class="c-filter__wrapper d-none d-lg-block">


                <div id="hook_articlelistsidebar" class="" data-asp-hook="47" data-asp-hook-name="ArticleListSidebar">
                    <!-- Filtrowanie po dost&#x119;pno&#x15B;ci -->

                    <div data-control-hook-id="84" data-control-id="59" data-control-order="1" data-control-name="Filtrowanie po dostępności" data-control-type="ArticleListAvailability">



                        <div class="mb-4 pl-2" data-control-type="AdvancedSearch" data-bind="init: $root.availability.bind($root, 'none')">
                            <div class="custom-control custom-checkbox custom-control--availability custom-checkbox--switch">
                                <input type="checkbox" name="fromAdvancedSearch1" class="custom-control-input" id="fromAvailableSearch1" data-bind="
        checked: availability() != 'none',
        event: { change: filterAvailability.bind($root, 'available') }">
                                <span class="availibility-slider"></span>
                                <label class="custom-control-label custom-control-label--availability c-input__text" for="fromAvailableSearch1">
                                    <span>Tik prieinamus</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Filtrowanie po dost&#x119;pno&#x15B;ci -->
                    <!-- Filtrowanie po cenie -->

                    <div data-control-hook-id="87" data-control-id="39" data-control-order="2" data-control-name="Filtrowanie po cenie" data-control-type="ArticleListPrices">



                        <div class="mb-3" data-control-type="AdvancedSearch">
                            <div class="">
                                <form data-bind="submit: filterByPriceOnChange.bind($root, '')" novalidate="" id="price_form">
                                    <div class="row no-gutters d-flex align-items-center justify-content-between mt-4">
                                        <div class="col-12 col-sm col-lg-12 col-xl-5 c-input__text mb-3 pl-2">
                                            <span>Kainų diapazonas</span>
                                        </div>
                                        <div class="col col-md-5 col-xl-3">
                                            <div class="c-form-group d-flex align-items-center">
                                                <label for="from" class="label-in-input"></label>
                                                <input class="c-input c-input--label-in text-center" type="text" name="price-from" id="from" value="0" data-bind="
                    initializeValue: min,
                    value: min,
                    valueUpdate: 'afterkeydown',
                    event: { keyup: filterByPriceOnChange.bind($root, '', price_form) }
                    ">
                                            </div>
                                        </div>
                                        <div class="mb-3 font-weight-bold">–</div>
                                        <div class="col col-md-5 col-xl-3">
                                            <div class="c-form-group d-flex align-items-center">
                                                <label for="to" class="label-in-input"></label>
                                                <input class="c-input c-input--label-in text-center" type="text" name="price-to" id="to" value="438,85" data-bind="
                    initializeValue: max,
                    value: max,
                    valueUpdate: 'afterkeydown',
                    event: { keyup: filterByPriceOnChange.bind($root, '', price_form) }
                    ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center px-3 mb-3">
                                            <div class="slider slider-horizontal" id=""><div class="slider-track"><div class="slider-track-low" style="left: 0px; width: 0%;"></div><div class="slider-selection" style="left: 0%; width: 100%;"></div><div class="slider-track-high" style="right: 0px; width: 0%;"></div></div><div class="tooltip tooltip-main top" role="presentation" style="left: 50%;"><div class="tooltip-arrow"></div><div class="tooltip-inner">0 : 438.85</div></div><div class="tooltip tooltip-min top" role="presentation" style="left: 0%;"><div class="tooltip-arrow"></div><div class="tooltip-inner">0</div></div><div class="tooltip tooltip-max top" role="presentation" style="left: 100%;"><div class="tooltip-arrow"></div><div class="tooltip-inner">438.85</div></div><div class="slider-handle min-slider-handle round" role="slider" aria-valuemin="0" aria-valuemax="438.85" aria-valuenow="0" tabindex="0" style="left: 0%;"></div><div class="slider-handle max-slider-handle round" role="slider" aria-valuemin="0" aria-valuemax="438.85" aria-valuenow="438.85" tabindex="0" style="left: 100%;"></div></div><input id="input-price-slider" type="text" class="c-slider-price" value="0,438.85" data-slider-min="0" data-slider-max="438.85" data-slider-step="0.1" data-slider-value="[0,438.85]" data-bind="event: { change: filterByPriceOnChange.bind($root, '', price_form) }" data-value="0,438.85" style="display: none;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Filtrowanie po cenie -->
                </div>

            </div>
            <div class="">


                <div id="hook_category" class="" data-asp-hook="75" data-asp-hook-name="Category">
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row my-4">
                <div class="col-12">


                    <div id="hook_seodescriptiontophook" class="" data-asp-hook="65" data-asp-hook-name="seoDescriptionTopHook">
                    </div>

                </div>
                <div class="col-12 col-sm">


                    <div id="hook_articlelistsort" class="" data-asp-hook="48" data-asp-hook-name="ArticleListSort">
                        <!-- Sortowanie listy towarowej -->

                        <div data-control-hook-id="48" data-control-id="2" data-control-order="1" data-control-name="Sortowanie listy towarowej" data-control-type="ArticleListSort">

                            <div data-control-type="ArticleList">

                                <select class="c-select" data-bind="value: sortType">
                                    <option value="avail" selected="selected">Rūšiuoti pagal Prieinamumas</option>
                                    <option value="kod">Rūšiuoti pagal kodą</option>
                                    <option value="price-asc">Rūšiuoti pagal kainą kylančios</option>
                                    <option value="price-desc">Rūšiuoti pagal kainą mažėjančios</option>
                                </select>
                            </div>
                        </div>
                        <!-- Sortowanie listy towarowej -->
                    </div>

                </div>
                <div class="col d-sm-flex justify-content-xs-center justify-content-sm-end align-items-center">


                    <div class="d-flex align-items-center justify-content-center c-pagination__top-custom mt-2 mt-sm-0" data-control-type="ArticleList">

    <span class="">


<svg class="c-icon c-icon--pagination">
  <use xlink:href="#arrow-left-slider"></use>
</svg>

    </span>
                        <span class="mx-1">
    <input class="c-input c-input--top-pagination text-right p-2 mx-3" value="1" data-bind="enter: $element.blur(), event: { blur: onChangePage.bind($root, $element.value, 8) }">
  </span>
                        <div class="c-btn c-btn--white-round">
                            <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO1&amp;segment1=amortizatoriai&amp;page=2">


                                <svg class="c-icon c-icon--has-next-pagination">
                                    <use xlink:href="#arrow-right-slider"></use>
                                    <svg id="arrow-right-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                        <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
                                    </svg>
                                </svg>

                            </a>
                        </div>

                        <span class="c-pagination__top-custom__title ml-3">
    <span>nuo</span>
    <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO1&amp;segment1=amortizatoriai&amp;page=8" title="8">8</a>
  </span>
                    </div>
                </div>
            </div>
            <div class="c-products" data-list-loading="false">
                <!-- foreach() -->
                @foreach($products as $product)
                <div class="c-panel c-panel--flatten">
                    <div class="row my-3 pt-2 pr-3 pb-2 pl-2">
                        <div class="col-12 c-product-image-col d-flex align-items-center mx-auto">
                            <div class="c-product-image" data-control-type="Blank">
                                <div class="c-product-image__slides">
                                    <div class="c-product-image__slide">
                                        <a class="c-product-image__link" href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A89040E-01.jpg" data-toggle="lightbox" data-gallery="/variklio-dangcio-amortizatorius-kapoto-dujin-spyruokl--a89040e">
                                            <img class="c-product-image__image" src="/api/media/stock-article-image?fileName=A89040E-01.jpg&amp;width=170&amp;height=170" alt="VARIKLIO DANGČIO AMORTIZATORIUS / KAPOTO DUJINĖ SPYRUOKLĖ" data-bind="lazySrc: ''">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr--vertical d-none d-sm-block">
                        <div class="col">
                            <h3 class="c-product__title c-product__title--light d-flex justify-content-start border-bottom pb-2 mb-2">
                                <a href="https://www.rm-autodalys.eu/variklio-dangcio-amortizatorius-kapoto-dujin-spyruokl--a89040e" title="VARIKLIO DANGČIO AMORTIZATORIUS / KAPOTO DUJINĖ SPYRUOKLĖ">{{$product->name}}</a>
                            </h3>
                            <div class="row">
                                <div class="col d-flex flex-column align-items-start">

                                    <p class="c-product__display-code">
                                        <span>Prekės kodas:</span>
                                        <span>{{$product->reference}}</span>
                                    </p>

                                    <div class="c-product__description mb-3">

                                        {{$product->short_description}}                     </div>

                                    <div class="c-product-stock d-flex flex-column order-1 order-sm-2">
                                        <div class="c-product-stock d-flex flex-column">


                                            <small class="d-block text-muted text-uppercase c-product-stock__text">
                                                <span>Prieinamumas</span>
                                            </small>
                                            <div class="d-flex flex-column flex-xl-row">
                                                <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                                    <span class="c-product-stock__name mr-2">Parduotuvė</span>
                                                    <span class="c-product-stock__availability
          ">
            {{$product->stock_shop}} <span class="ml-1">vnt</span>
        </span>
                                                </div>
                                                <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                                    <span class="c-product-stock__name mr-2">Sandėlis</span>
                                                    <span class="c-product-stock__availability
          c-product-stock__availability--more">{{$product->stock_supplier}}<span class="ml-1">vnt</span>
        </span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col col-sm-12 order-2 order-sm-1 d-flex flex-column align-items-end">


                                            <div class="d-flex align-items-center">



                                                <div class="c-product__price-gross">
                                                    4,38
                                                    €
                                                </div>
                                            </div>
                                            <div class="c-product__price-net">
                                                / 3,62
                                                €
                                                <span>be PVM</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end align-items-end">


                                        <div type="ADD_TO_CART" data-control-type="Order">
                                            <form action="{{route('cart.store')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="d-flex">
                                                    <input class="c-input c-input--quantity c-input--no-border" autocomplete="off" min="1" name="amount" step="1" type="number" value="1">
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <button class="c-btn c-btn--secondary" type="submit" data-bind="css: { 'c-btn--loading': submitted() }" data-loading="Prašome palaukti ...">
                                                        <span class="d-flex">


                                                        <svg class="c-icon c-btn__icon">
                                                            <use xlink:href="#add-to-cart"></use>
                                                        </svg>

                                                        <span class="ml-1">Įdėti į krepšelį</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col d-flex justify-content-center align-items-center">


                    <div class="d-flex align-items-center justify-content-center c-pagination__top-custom mt-2 mt-sm-0" data-control-type="ArticleList">

    <span class="">


<svg class="c-icon c-icon--pagination">
  <use xlink:href="#arrow-left-slider"></use>
    <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
    <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
  </svg>
</svg>

    </span>
                        <span class="mx-1">
    <input class="c-input c-input--top-pagination text-right p-2 mx-3" value="1" data-bind="enter: $element.blur(), event: { blur: onChangePage.bind($root, $element.value, 8) }">
  </span>
                        <div class="c-btn c-btn--white-round">
                            <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO1&amp;segment1=amortizatoriai&amp;page=2">


                                <svg class="c-icon c-icon--has-next-pagination">
                                    <use xlink:href="#arrow-right-slider"></use>
                                </svg>

                            </a>
                        </div>

                        <span class="c-pagination__top-custom__title ml-3">
    <span>nuo</span>
    <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO1&amp;segment1=amortizatoriai&amp;page=8" title="8">8</a>
  </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">


                    <div id="hook_seodescriptionbottomhook" class="" data-asp-hook="66" data-asp-hook-name="seoDescriptionBottomHook">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
