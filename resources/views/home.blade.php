@extends('welcome')

@section('title','Automobilių dalys')
@section('content')
    {{ Breadcrumbs::render('home') }}

    <div class="row mt-3 mt-sm-4">
        <div class="col-12 col-lg-3">
            <div class="search_tec">
                <div class="header-cat justify-content-between align-items-center">
                    <span class="pl-2 py-1 mb-0">Paieška pagal automobilį</span>
                    <hr class="border-bottom-blue">
                </div>
                <form action="{{route('tecDocCatalog1')}}" method="post">
                    {{csrf_field()}}
                    <div class="selectors row align-items-center justify-content-center">
                        <div class="col-md-10 col-sm-12 select-tec-doc">
                            <select class="c-select2" name="manufacturers" id="manufacturers" style="min-width: 100%">
                                <option value="0">Pasirinkite gamintoją</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->getManuId()}}">
                                        {{$manufacturer->getManuName()}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 col-sm-12 select-tec-doc">
                            <select disabled class="c-select2" name="models" id="models" style="min-width: 100%">
                                <option selected="selected" value="0">Pasirinkti modelį</option>
                            </select>
                        </div>
                        <div class="col-md-10 col-sm-12 select-tec-doc">
                            <select disabled class="c-select2" name="modification" id="modification" style="min-width: 100%">
                                <option selected="selected" value="0">Išsirinkite modifikaciją</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <button id="button" disabled class="c-btn c-btn--red text-uppercase px-sm-5 mt-3" type="submit" style="color: #212529;">Paieška</button>
                    </div>
                </form>
                <script>
                    $(document).ready(function ($) {
                        $('#manufacturers').on('change', function() {

                            if(this.value  == 0) {
                                $("#models").prop('disabled', true);
                                $("#modification").prop('disabled', true);
                                $("#button").prop('disabled', true);
                            } else {
                                $("#models").prop('disabled', false);
                            }
                        });
                        $('#models').on('change', function() {

                            if(this.value == 0) {
                                $("#modification").prop('disabled', true).val(0);
                                $("#button").prop('disabled', true);

                            } else {
                                $("#modification").prop('disabled', false);
                            }
                        });

                        $('#modification').on('change', function() {

                            if(this.value == 0) {
                                $("#button").prop('disabled', true);
                            } else {
                                $("#button").prop('disabled', false);
                            }
                        });

                        $('#manufacturers').select2();
                        $('#models').select2();
                        $('#modification').select2();
                        // getModels
                        $("#manufacturers").change(function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var formData = {
                                manuId: $('#manufacturers').val(),
                            };
                            var type = "POST";
                            var ajaxurl = '{{route('ajax.getModels')}}';
                            if(formData.manuId !== 0) {
                                $.ajax({
                                    type: type,
                                    url: ajaxurl,
                                    data: formData,
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#models')
                                            .empty()
                                            .append('<option selected="selected" value="0">Pasirinkti modelį</option>');
                                        $('#modification')
                                            .empty()
                                            .append('<option selected="selected" value="0">Pasirinkti modelį</option>');

                                        var options = $("#models");
                                        //don't forget error handling!
                                        $.each(data, function (index, item) {
                                            //console.log(item);
                                            options.append($("<option />").val(item.modelId).text(item.modelName + ' ' + item.years));
                                        });
                                    },
                                    error: function (data) {
                                        console.log(data);
                                    }
                                });
                            } else if(formData.manuId === 0) {
                                $('#models')
                                    .empty()
                                    .append('<option selected="selected" value="0">Pasirinkti modelį</option>');

                            }

                        });

                        $("#models").change(function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var formData = {
                                manuId: $('#manufacturers').val(),
                                modId: $('#models').val(),
                            };
                            var type = "POST";
                            var ajaxurl = '{{route('ajax.getVehicleByCriteria')}}';
                            if(formData.modId !== 0) {
                                $.ajax({
                                    type: type,
                                    url: ajaxurl,
                                    data: formData,
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#modification')
                                            .empty()
                                            .append('<option selected="selected" value="0">Išsirinkite modifikaciją</option>');

                                        let options = $("#modification");

                                        $.each(data.fuels, function (index, item){
                                            let a = "<optgroup label="+ item + " for=" + item + "></optgroup>";
                                            options.append(a);
                                        });
                                        $.each(data.modification, function (index, item) {
                                            let opt1 = "optgroup[for=\'" + item.fuelType +"\']";
                                            //item.cylinderCapacityLiter
                                            $("<option>").val(index).text(item.typeName +
                                                ' (' + item.powerKwTo + ' kW / ' + item.powerHpTo + ' AG) ' + item.years).appendTo($(opt1));
                                            /* options.append($("<option />").val(index).text(item.typeName + ' ' + item.cylinderCapacityLiter +
                                                 ' (' + item.powerKwTo + ' kW / ' + item.powerHpTo + ' AG) ' + item.years));*/
                                        });
                                    },
                                    error: function (data) {
                                        console.log(data);
                                    }
                                });
                            } else if(formData.modId === 0) {
                                $('#modification')
                                    .empty()
                                    .append('<option selected="selected" value="0">Pasirinkti modelį</option>');

                            }

                        });

                    });
                </script>
            </div>

            <div class="cat" style="padding-top: 15px">
                <div class="header-cat justify-content-between align-items-center">
                    <span class="pl-2 py-1 mb-0">Prekių grupės</span>
                    <hr class="border-bottom-blue">
                </div>
                <div class="body d-none d-lg-block">
                    @foreach($categories as $category)
                    <li class="cat-menu-item border-bottom mx-2 mb-3 pb-2 pl-1">
                        <div class="">
                            <a  @if(isset($category->children[0])) class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between"
                               data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" @else style="padding-left: 10px" @endif
                               href="{{route('products.index', ['category' => $category->slug])}}"
                               title="{{$category->name}}">
                                <span class="c-category-menu__name mr-1"> {{$category->name}}</span>
                                @if(isset($category->children[0]))
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
                                            <path d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                        </svg>
                                    </use>
                                </svg>
                                    @endif
                            </a>

                            @if(isset($category->children))
                                <ul class="c-category-menu__children dropdown-menu px-3" x-placement="right-start" style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;"
                                    id="category-drop">
                                @foreach($category->children as $category)
                                        @include('partials.minicategory', $category)
                                @endforeach
                                </ul>
                            @endif
                        </div>
                    </li>
                    @endforeach
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


                        </div>


                    </div>
                </div>
                <!-- Slider g&#x142;&#xF3;wny -->
            </div>
            <div id="owl-favProd" class="owl-carousel" style="width: 100%;overflow: hidden;">
                @foreach($favProducts as $favProduct)
                    <div class="item c-product-slider p-3">

                        <div class="c-product-slider__container">

                            <div class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                <div class="d-flex">
                                    @if($favProduct->stock_shop + $favProduct->stock_supplier + $favProduct->stock_supplier2 != 0 && $favProduct->price > 0)
                                        <div type="ADD_TO_CART" data-control-type="Order">
                                            <form action="{{route('cart.store')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="d-flex">
                                                    <button class="c-btn c-btn--slider-cart u-rounded-circle w-100" type="submit" data-bind="css: { 'c-btn--loading': submitted() }" data-loading="">
                                                                                        <span class="d-flex justify-content-center align-items-center">
                                                                                            <svg class="c-icon c-icon--hover">
                                                                                              <use xlink:href="#add-to-cart">
                                                                                                  <symbol id="add-to-cart" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 22">
                                                                                                    <path d="M27,4,23.36,14.11A1.39,1.39,0,0,1,22,15H10l.5,1.37H22.32a.51.51,0,0,1,.51.5.5.5,0,0,1-.51.5H9.79L3.84,1H.51A.5.5,0,0,1,0,.5.5.5,0,0,1,.51,0H4.57l1,2.74h0l.36,1h0L9.65,14H22a.39.39,0,0,0,.36-.25l3.54-10h-.05l.37-1a1,1,0,0,1,.57.36A.91.91,0,0,1,27,4ZM22.11,20a2.09,2.09,0,1,1-2.09-2A2.06,2.06,0,0,1,22.11,20Zm-1,0A1.06,1.06,0,0,0,19,20a1.06,1.06,0,0,0,2.11,0Zm-6.8,0a2.08,2.08,0,1,1-2.08-2A2.06,2.06,0,0,1,14.28,20Zm-1,0a1.06,1.06,0,1,0-1.06,1A1.06,1.06,0,0,0,13.26,20ZM16.44,9V1h-1V9L12.57,6.19l-.72.71,4.08,4L20,6.9l-.72-.71Z"></path>
                                                                                                  </symbol>
                                                                                              </use>
                                                                                            </svg>
                                                                                        </span>
                                                    </button>
                                                    <input type="hidden" name="id" value="{{$favProduct->id}}">
                                                    <input hidden class="c-input c-input--quantity c-input--no-border" autocomplete="off" data-bind="" min="1" name="amount" step="1" type="number" value="1">                                                                            </div>
                                            </form>
                                        </div>
                                    @endif
                                    <a class="c-btn c-btn--slider-eye u-rounded-circle text-center ml-3 d-flex justify-content-center align-items-center" href="{{route('products.show', $favProduct->reference)}}">
                                        <svg class="c-icon c-icon--hover">
                                            <use xlink:href="#look">
                                                <symbol id="look" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 16">
                                                    <path d="M11.5,16A12.43,12.43,0,0,0,22.92,8.19L23,8l-.08-.19A12.43,12.43,0,0,0,11.5,0,12.43,12.43,0,0,0,.08,7.81L0,8l.08.19A12.43,12.43,0,0,0,11.5,16Zm0-15A11.41,11.41,0,0,1,21.9,8a11.41,11.41,0,0,1-10.4,7A11.41,11.41,0,0,1,1.1,8,11.41,11.41,0,0,1,11.5,1Zm0,12a5,5,0,0,0,5.11-5A5,5,0,0,0,11.5,3,5,5,0,0,0,6.39,8,5,5,0,0,0,11.5,13Zm0-9a4,4,0,0,1,4.09,4A4.09,4.09,0,0,1,7.41,8,4,4,0,0,1,11.5,4Z"></path>
                                                </symbol>
                                            </use>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="c-product-image">
                            <div class="c-product-image__slides">
                                <div class="c-product-image__slide">
                                    <a class="c-product-image__link" href="{{route('products.show', $favProduct->reference)}}">
                                        <img class="c-product-image__image owl-lazy" @if($favProduct->img->first() !== null) src="{{$favProduct->img->first()->name}}" @else src="/storage/images/no_photo_500.jpg" @endif alt="" style="opacity: 1;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('products.show', $favProduct->reference)}}" title="{{$favProduct->name}}">
                            <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2" title="{{$favProduct->name}}">{{$favProduct->name}}</h3>
                        </a>
                        <div class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                            {{$favProduct->priceTax()}} €
                        </div>
                        @if(isset($favProduct->price_stock))
                            <div class="c-product__price-retail c-product__price-retail--sm">
                                {{$favProduct->price_stock}} €
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div id="hook_frontmodules" class="" data-asp-hook="78" data-asp-hook-name="frontModules">
                <!-- TabSlider -->

                <div data-control-hook-id="117" data-control-id="65" data-control-order="1"
                     data-control-name="TabSlider" data-control-type="Html">

                    <div class="container">
                        <ul class="nav c-panel-tabs d-flex align-items-center w-100 mt-2 mt-md-5" id="myTab"
                            role="tablist">
                            <li class="c-panel-tabs__item mr-3">

                            </li>
                            <li class="c-panel-tabs__item mx-sm-3">

                            </li>
                        </ul>
                    </div>
                    <div class="c-tab-content tab-content px-0 px-xl-5 mt-3" id="myTabContent">
                        <div class="tab-pane show active px-0 px-xl-5" id="grupp">


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


                                            <div id="owl-grupProd" class="owl-carousel" style="width: 100%;overflow: hidden;">
                                                @foreach($group as $key => $value)
                                                    <div class="item c-product-slider p-3">

                                                        <div class="c-product-slider__container">

                                                            <div class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                <div class="d-flex">
                                                                    <a class="c-btn c-btn--slider-eye u-rounded-circle text-center ml-3 d-flex justify-content-center align-items-center" href="/products?category={{$key}}">
                                                                        <svg class="c-icon c-icon--hover">
                                                                            <use xlink:href="#look">
                                                                                <symbol id="look" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 16">
                                                                                    <path d="M11.5,16A12.43,12.43,0,0,0,22.92,8.19L23,8l-.08-.19A12.43,12.43,0,0,0,11.5,0,12.43,12.43,0,0,0,.08,7.81L0,8l.08.19A12.43,12.43,0,0,0,11.5,16Zm0-15A11.41,11.41,0,0,1,21.9,8a11.41,11.41,0,0,1-10.4,7A11.41,11.41,0,0,1,1.1,8,11.41,11.41,0,0,1,11.5,1Zm0,12a5,5,0,0,0,5.11-5A5,5,0,0,0,11.5,3,5,5,0,0,0,6.39,8,5,5,0,0,0,11.5,13Zm0-9a4,4,0,0,1,4.09,4A4.09,4.09,0,0,1,7.41,8,4,4,0,0,1,11.5,4Z"></path>
                                                                                </symbol>
                                                                            </use>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="c-product-image">
                                                            <div class="c-product-image__slides">
                                                                <div class="c-product-image__slide">
                                                                    <a class="c-product-image__link" href="/products?category={{$key}}">
                                                                        <img class="c-product-image__image owl-lazy" src="/storage/group/{{$value}}.jpg" alt="" style="opacity: 1;">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>



                                            <div class="owl-next-custom owl-carousel-custom__icon--bg"><span>
                                                    <svg class="c-icon owl-carousel-custom__icon--next">
                                                        <use xlink:href="#arrow-right-slider">
                                                            <svg id="arrow-right-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
    <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
                                                        </use>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Nowosci -->
                            </div>

                        </div>
                    </div>

                </div>
            <!-- Slider Producenci -->
            </div>
            <div id="hook_frontmodules" class="" data-asp-hook="78" data-asp-hook-name="frontModules">
                <!-- TabSlider -->

                <div data-control-hook-id="117" data-control-id="65" data-control-order="1"
                     data-control-name="TabSlider" data-control-type="Html">

                    <div class="container">
                        <ul class="nav c-panel-tabs d-flex align-items-center w-100 mt-2 mt-md-5" id="myTab"
                            role="tablist">
                            <li class="c-panel-tabs__item mr-3">

                            </li>
                            <li class="c-panel-tabs__item mx-sm-3">

                            </li>
                        </ul>
                    </div>
                    <div class="c-tab-content tab-content px-0 px-xl-5 mt-3" id="myTabContent">
                        <div class="tab-pane show active px-0 px-xl-5" id="spec">


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


                                            <div id="owl-specProd" class="owl-carousel" style="width: 100%;overflow: hidden;">
                                                @foreach($specProducts as $specProduct)
                                                    <div class="item c-product-slider p-3">

                                                        <div class="c-product-slider__container">

                                                            <div class="c-product-order-slider__container d-flex justify-content-center mb-2">
                                                                <div class="d-flex">
                                                                    @if($specProduct->stock_shop + $specProduct->stock_supplier + $specProduct->stock_supplier2 != 0 && $specProduct->price > 0)
                                                                        <div type="ADD_TO_CART" data-control-type="Order">
                                                                            <form action="{{route('cart.store')}}" method="post">
                                                                                {{csrf_field()}}
                                                                                <div class="d-flex">
                                                                                    <button class="c-btn c-btn--slider-cart u-rounded-circle w-100" type="submit" data-bind="css: { 'c-btn--loading': submitted() }" data-loading="">
                                                                                        <span class="d-flex justify-content-center align-items-center">
                                                                                            <svg class="c-icon c-icon--hover">
                                                                                              <use xlink:href="#add-to-cart">
                                                                                                  <symbol id="add-to-cart" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 22">
                                                                                                    <path d="M27,4,23.36,14.11A1.39,1.39,0,0,1,22,15H10l.5,1.37H22.32a.51.51,0,0,1,.51.5.5.5,0,0,1-.51.5H9.79L3.84,1H.51A.5.5,0,0,1,0,.5.5.5,0,0,1,.51,0H4.57l1,2.74h0l.36,1h0L9.65,14H22a.39.39,0,0,0,.36-.25l3.54-10h-.05l.37-1a1,1,0,0,1,.57.36A.91.91,0,0,1,27,4ZM22.11,20a2.09,2.09,0,1,1-2.09-2A2.06,2.06,0,0,1,22.11,20Zm-1,0A1.06,1.06,0,0,0,19,20a1.06,1.06,0,0,0,2.11,0Zm-6.8,0a2.08,2.08,0,1,1-2.08-2A2.06,2.06,0,0,1,14.28,20Zm-1,0a1.06,1.06,0,1,0-1.06,1A1.06,1.06,0,0,0,13.26,20ZM16.44,9V1h-1V9L12.57,6.19l-.72.71,4.08,4L20,6.9l-.72-.71Z"></path>
                                                                                                  </symbol>
                                                                                              </use>
                                                                                            </svg>
                                                                                        </span>
                                                                                    </button>
                                                                                    <input type="hidden" name="id" value="{{$specProduct->id}}">
                                                                                    <input hidden class="c-input c-input--quantity c-input--no-border" autocomplete="off" data-bind="" min="1" name="amount" step="1" type="number" value="1">                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    @endif
                                                                    <a class="c-btn c-btn--slider-eye u-rounded-circle text-center ml-3 d-flex justify-content-center align-items-center" href="{{route('products.show', $specProduct->reference)}}">
                                                                        <svg class="c-icon c-icon--hover">
                                                                            <use xlink:href="#look">
                                                                                <symbol id="look" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 16">
                                                                                    <path d="M11.5,16A12.43,12.43,0,0,0,22.92,8.19L23,8l-.08-.19A12.43,12.43,0,0,0,11.5,0,12.43,12.43,0,0,0,.08,7.81L0,8l.08.19A12.43,12.43,0,0,0,11.5,16Zm0-15A11.41,11.41,0,0,1,21.9,8a11.41,11.41,0,0,1-10.4,7A11.41,11.41,0,0,1,1.1,8,11.41,11.41,0,0,1,11.5,1Zm0,12a5,5,0,0,0,5.11-5A5,5,0,0,0,11.5,3,5,5,0,0,0,6.39,8,5,5,0,0,0,11.5,13Zm0-9a4,4,0,0,1,4.09,4A4.09,4.09,0,0,1,7.41,8,4,4,0,0,1,11.5,4Z"></path>
                                                                                </symbol>
                                                                            </use>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="c-product-image">
                                                            <div class="c-product-image__slides">
                                                                <div class="c-product-image__slide">
                                                                    <a class="c-product-image__link" href="{{route('products.show', $specProduct->reference)}}">
                                                                        <img class="c-product-image__image owl-lazy" @if($specProduct->img->first() !== null) src="{{$specProduct->img->first()->name}}" @else src="/storage/images/no_photo_500.jpg" @endif alt="" style="opacity: 1;">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{route('products.show', $specProduct->reference)}}" title="{{$specProduct->name}}">
                                                            <h3 class="c-product__title c-product__title--light c-product__title--bilinear my-2" title="{{$specProduct->name}}">{{$specProduct->name}}</h3>
                                                        </a>
                                                        <div class="c-product__price-gross c-product__price-gross--sm c-product__price-gross--secondary">
                                                            {{$specProduct->priceTax()}} €
                                                        </div>
                                                        @if(isset($specProduct->price_stock))
                                                            <div class="c-product__price-retail c-product__price-retail--sm">
                                                                {{$specProduct->price_stock}} €
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>



                                            <div class="owl-next-custom owl-carousel-custom__icon--bg"><span>
                                                    <svg class="c-icon owl-carousel-custom__icon--next">
                                                        <use xlink:href="#arrow-right-slider">
                                                            <svg id="arrow-right-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
    <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
                                                        </use>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Nowosci -->
                            </div>

                        </div>
                    </div>

                </div>
            <!-- Slider Producenci -->
            </div>
            <div data-control-hook-id="119" data-control-id="16" data-control-order="3"
                 data-control-name="Slider Producenci" data-control-type="SliderSlick">


                <div class="py-4 mt-4">
                    <div class="container">
                        <div class="c-producers p-5 border-top" style="width: 100%;overflow: hidden;">
                            <div class="owl-carousel" id="owl-brand">
                                @foreach($brands as $brand)
                                    <div class="item"><img src="{{$brand->img}}" alt="Owl Image" style="width: 68px"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .owl-item {
                    margin-top: 15px;
                    margin-bottom: 15px;
                }
            </style>
        </div>
    </div>

@endsection
