@extends('welcome')

@section('title','Prekės')
@section('content')
    {{ Breadcrumbs::render('products') }}
 {{--<products></products>--}}
    <div class="row">
        <div class="col-12"></div>
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
            {{--<div class="c-filter__wrapper d-none d-lg-block">
                <div id="hook_articlelistsidebar">
                    <div data-control-name="" data-control-type="ArticleListAvailability">
                        <div class="mb-4 pl-2">
                            <div class="custom-control custom-checkbox custom-control--availability custom-checkbox--switch">
                                <input type="checkbox" name="fromAdvancedSearch1" class="custom-control-input" id="fromAvailableSearch1">
                                <span class="availibility-slider"></span>
                                <label class="custom-control-label custom-control-label--availability c-input__text">
                                    <span>Tik prieinamus</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div data-control-name="" data-control-type="ArticleListPrices">
                        <div class="mb-3">
                            <div class="">
                                <form novalidate="" id="price_form">
                                    <div class="row no-gutters d-flex align-items-center justify-content-between mt-4">
                                        <div class="col-12 col-sm col-lg-12 col-xl-5 c-input__text mb-3 pl-2">
                                            <span>Kainų diapazonas</span>
                                        </div>
                                        <div class="col col-md-5 col-xl-3">
                                            <div class="c-form-group d-flex align-items-center">
                                                <label for="from" class="label-in-input"></label>
                                                <input class="c-input c-input--label-in text-center" type="text"
                                                       name="price-from" id="from" value="1,25">
                                            </div>
                                        </div>
                                        <div class="mb-3 font-weight-bold">–</div>
                                        <div class="col col-md-5 col-xl-3">
                                            <div class="c-form-group d-flex align-items-center">
                                                <label for="to" class="label-in-input"></label>
                                                <input class="c-input c-input--label-in text-center" type="text"
                                                       name="price-to" id="to" value="37,62">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center px-3 mb-3">
                                            <div class="slider slider-horizontal" id="">
                                                <div class="slider-track">
                                                    <div class="slider-track-low" style="left: 0px; width: 0.137476%;"></div>
                                                    <div class="slider-selection" style="left: 0.137476%; width: 99.8075%;"></div>
                                                    <div class="slider-track-high" style="right: 0px; width: 0.0549904%;"></div>
                                                </div>
                                                <div class="tooltip tooltip-main top" role="presentation" style="left: 50.0412%;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner">1.3 : 37.6</div>
                                                </div>
                                                <div class="tooltip tooltip-min top" role="presentation" style="left: 0.137476%;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner">1.3</div>
                                                </div>
                                                <div class="tooltip tooltip-max top" role="presentation" style="left: 99.945%;">
                                                    <div class="tooltip-arrow"></div>
                                                    <div class="tooltip-inner">37.6</div>
                                                </div>
                                                <div class="slider-handle min-slider-handle round" role="slider" aria-valuemin="1.25" aria-valuemax="37.62" aria-valuenow="1.3" tabindex="0" style="left: 0.137476%;"></div>
                                                <div class="slider-handle max-slider-handle round" role="slider" aria-valuemin="1.25" aria-valuemax="37.62" aria-valuenow="37.6" tabindex="0" style="left: 99.945%;"></div>
                                            </div>
                                            <input id="input-price-slider" type="text" class="c-slider-price" style="display: none;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>--}}
            <div class="">
                <div id="hook_category" class="" data-asp-hook-name="Category"></div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row my-4">
                <div class="col-12"></div>
                <div class="col-12 col-sm">

                    <div id="hook_articlelistsort" class="" data-asp-hook-name="ArticleListSort">
                        <div data-control-name="" data-control-type="ArticleListSort">
                            <div data-control-type="ArticleList">
                                <form action="{{route('vehicle.catalog')}}" method="get">
                                    @if(isset(request()->category))
                                        <input hidden type="text" name="category" value="{{request()->category}}">
                                    @endif
                                    @if(isset(request()->carId))
                                        <input hidden type="text" name="carId" value="{{request()->carId}}">
                                    @endif
                                    <select name="sort" id="sort" class="c-select filter-product" onchange="this.form.submit()">
                                        <option value="avail" @if(request()->sort == 'avail') selected="selected" @endif>Rūšiuoti pagal Prieinamumas</option>
                                        <option value="kod" @if(request()->sort == 'kod') selected="selected" @endif>Rūšiuoti pagal kodą</option>
                                        <option value="low_high" @if(request()->sort == 'low_high') selected="selected" @endif>Rūšiuoti pagal kainą kylančios</option>
                                        <option value="high_low" @if(request()->sort == 'high_low') selected="selected" @endif>Rūšiuoti pagal kainą mažėjančios</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col d-sm-flex justify-content-xs-center justify-content-sm-end align-items-center">

                     <div class="d-flex align-items-center justify-content-center c-pagination__top-custom mt-2 mt-sm-0" data-control-type="ArticleList">

                         <div class="c-btn c-btn&#45;&#45;white-round">
                             <a class="" href="{{$products->previousPageUrl()}}">


                                 <svg class="c-icon c-icon&#45;&#45;has-prev-pagination">
                                     <use xlink:href="#arrow-left-slider">
                                         <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                             <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
                                         </svg>
                                     </use>
                                 </svg>

                             </a>
                         </div>
                         <span class="mx-1">
     <input class="c-input c-input&#45;&#45;top-pagination text-right p-2 mx-3" value="{{$products->currentPage()}}">
   </span>
                         <div class="c-btn c-btn&#45;&#45;white-round">
                             <a class="" href="{{$products->nextPageUrl()}}">


                                 <svg class="c-icon c-icon&#45;&#45;has-next-pagination">
                                     <use xlink:href="#arrow-right-slider">
                                         <svg id="arrow-right-slider" data-name="Layer 1"
                                              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                             <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
                                         </svg>
                                     </use>
                                 </svg>

                             </a>
                         </div>

                         <span class="c-pagination__top-custom__title ml-3">
     <span>nuo</span>
     <a class="" href="?page={{$products->lastPage()}}" title="{{$products->lastPage()}}">{{$products->lastPage()}}</a>
   </span>
                     </div>


                </div>

            </div>
            <div class="c-products">

                @forelse($products as  $key => $product )
                <div class="c-panel c-panel--flatten">
                    <div class="row my-3 pt-2 pr-3 pb-2 pl-2">
                        <div class="col-12 c-product-image-col d-flex align-items-center mx-auto">
                            <div class="c-product-image" data-control-type="Blank">
                                <div class="c-product-image__slides">
                                    <div class="c-product-image__slide">
                                        <a class="c-product-image__link"
                                           href="{{route('products.show', $product->reference)}}"
                                           data-toggle="lightbox">
                                            <img class="c-product-image__image"
                                                @if($product->img->first() !== null) src="{{$product->img->first()->name}}" @else src="/storage/images/no_photo_500.jpg" @endif
                                                 alt="{{$product->name}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr--vertical d-none d-sm-block">
                        <div class="col">
                            <h3 class="c-product__title c-product__title--light d-flex justify-content-start border-bottom pb-2 mb-2">
                                <a href="{{route('products.show',[$product->reference])}}">{{$product->name}}</a>
                                <span style="padding-left: 15px">
                                        <form action="{{'/products?analog='.$product->reference}}" method="get">
                                            {{csrf_field()}}
                                            <input name="id" hidden value="{{$product->id}}">
                                            <input type="text" name="analog" hidden value="{{$product->reference}}">
                                            <button class="btn btn-info" type="submit" style="padding: 0rem 0.75rem;">Ieškoti analogų</button>
                                        </form>
                                    </span>
                            </h3>
                            <div class="row">
                                <div class="col d-flex flex-column align-items-start">

                                    <p class="c-product__display-code">
                                        <span>Prekės kodas:</span>
                                        <span>{{$product->reference}}</span>
                                    </p>

                                    <div class="c-product__description mb-3">

                                        {{$product->short_description}}
                                    </div>

                                    <div class="c-product-stock d-flex flex-column order-1 order-sm-2">
                                        <div class="c-product-stock d-flex flex-column">


                                            <small class="d-block text-muted text-uppercase c-product-stock__text">
                                                <span>Prieinamumas</span>
                                            </small>
                                            <div class="d-flex flex-column flex-xl-row">
                                                <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
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
                                                    <span class="c-product-stock__name mr-2 ml-2">Pristatymas: <span class="c-product-stock__availability" style="color: #212529;">{{$product->supplier->delivery_time}} d.d.</span>@if($product->supplier->name === 'AJS') užsakant iki 12:00 @endif</span>
                                                </div>
                                                <div class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">

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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="row">
                                        <div
                                            class="col col-sm-12 order-2 order-sm-1 d-flex flex-column align-items-end">
                                            <div class="d-flex align-items-center">
                                                @if(isset($product->price_stock))
                                                <div class="c-product__price-retail c-product__price-retail--sm mr-4">
                                                    {{$product->price_stock}}
                                                    €
                                                </div>
                                                @endif
                                                <div class="c-product__price-gross">
                                                    {{$product->priceTax()}}
                                                    €
                                                </div>
                                            </div>
                                            <div class="c-product__price-net">
                                                / {{$product->price}}
                                                €
                                                <span>be PVM</span>
                                            </div>
                                            <div class="c-product-stock__name text-muted">
                                                Rekomenduojama maž. kaina: {{$product->price_recommend}} €
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end align-items-end">
                                        @if($product->stock_shop + $product->stock_supplier > 0 && $product->price > 0)
                                        <div type="ADD_TO_CART" data-control-type="Order">
                                            <form action="{{route('cart.store')}}" method="post">
                                                <div class="d-flex">
                                                    {{csrf_field()}}
                                                    <input class="c-input c-input--quantity c-input--no-border" autocomplete="off" data-bind="" min="1" name="amount" step="1" type="number" value="1">
                                                    <input type="hidden" name="id" value="{{$product->id}}">

                                                    <button class="c-btn c-btn--secondary" type="submit"
                                                            data-loading="Prašome palaukti ...">
                                                <span class="d-flex">
<svg class="c-icon c-btn__icon">
  <use xlink:href="#add-to-cart">
      <svg id="add-to-cart" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 22">
    <path
        d="M27,4,23.36,14.11A1.39,1.39,0,0,1,22,15H10l.5,1.37H22.32a.51.51,0,0,1,.51.5.5.5,0,0,1-.51.5H9.79L3.84,1H.51A.5.5,0,0,1,0,.5.5.5,0,0,1,.51,0H4.57l1,2.74h0l.36,1h0L9.65,14H22a.39.39,0,0,0,.36-.25l3.54-10h-.05l.37-1a1,1,0,0,1,.57.36A.91.91,0,0,1,27,4ZM22.11,20a2.09,2.09,0,1,1-2.09-2A2.06,2.06,0,0,1,22.11,20Zm-1,0A1.06,1.06,0,0,0,19,20a1.06,1.06,0,0,0,2.11,0Zm-6.8,0a2.08,2.08,0,1,1-2.08-2A2.06,2.06,0,0,1,14.28,20Zm-1,0a1.06,1.06,0,1,0-1.06,1A1.06,1.06,0,0,0,13.26,20ZM16.44,9V1h-1V9L12.57,6.19l-.72.71,4.08,4L20,6.9l-.72-.71Z"></path>
  </svg>
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

                @empty
                    <div class="text-center my-5 py-5">
                        <span class="c-headline">
                          <span>Produktų neratsa</span>
                        </span>
                    </div>
                        @endforelse
                <div class="col d-flex justify-content-center align-items-center">


                    <div class="d-flex align-items-center justify-content-center c-pagination__top-custom mt-2 mt-sm-0"
                         data-control-type="ArticleList">

                        <!--
                            <span class="">


                        <svg class="c-icon c-icon&#45;&#45;pagination">
                          <use xlink:href="#arrow-left-slider"></use>
                        </svg>

                            </span>
                                                <span class="mx-1">
                            <input class="c-input c-input&#45;&#45;top-pagination text-right p-2 mx-3" value="1">
                          </span>
                                                <div class="c-btn c-btn&#45;&#45;white-round">
                                                    <a class=""
                                                       href="https://www.rm-autodalys.eu/katalog?nodeId=AMO5&amp;segment1=amort-montavimo-elementai&amp;page=2">


                                                        <svg class="c-icon c-icon&#45;&#45;has-next-pagination">
                                                            <use xlink:href="#arrow-right-slider"></use>
                                                        </svg>

                                                    </a>
                                                </div>

                                                <span class="c-pagination__top-custom__title ml-3">
                            <span>nuo</span>
                            <a class=""
                               href="https://www.rm-autodalys.eu/katalog?nodeId=AMO5&amp;segment1=amort-montavimo-elementai&amp;page=10"
                               title="10">10</a>
                          </span>-->




                       {{-- <ul class="pagination">
                            <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                                <a class="page-link" href="#" tabindex="-1" @click="fetchProducts(pagination.prev_page_url)">Previous</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                            </li>
                            <!-- <li  class="page-item">
                                 <input class="c-input c-input&#45;&#45;top-pagination text-right p-2 mx-3" type="number" v-model="input_page"
                                        @submit="fetchProducts(pagination.search_page+'value')">
                             </li>-->
                            <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]">
                                <a class="page-link" href="#" @click="fetchProducts(pagination.next_page_url)">Next</a>
                            </li>
                        </ul>--}}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
           /* $('.filter-product').change(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('products.index', ['category' => request()->category])}}",
                    method: 'get',
                    data: {
                        sort: $('.filter-product').val(),

                    },
                    success: function(result){
                        console.log(result);
                    }});
            });*/


        })
    </script>
@endsection
