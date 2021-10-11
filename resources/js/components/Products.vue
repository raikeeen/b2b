<template>
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
            <div class="c-filter__wrapper d-none d-lg-block">
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

            </div>
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
                                <select class="c-select">
                                    <option value="avail" selected="selected">Rūšiuoti pagal Prieinamumas</option>
                                    <option value="kod">Rūšiuoti pagal kodą</option>
                                    <option value="price-asc">Rūšiuoti pagal kainą kylančios</option>
                                    <option value="price-desc">Rūšiuoti pagal kainą mažėjančios</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-sm-flex justify-content-xs-center justify-content-sm-end align-items-center">
                    <!-- <svg class="c-icon c-icon&#45;&#45;pagination">
                                <use xlink:href="#arrow-left-slider">
                                    <svg id="arrow-left-slider" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                        <path d="M12,13V0L0,6.5Zm-1.35-2.28L2.86,6.5l7.79-4.22Z"></path>
                                    </svg>
                                </use>
                            </svg>-->
                    <!--<svg class="c-icon c-icon&#45;&#45;has-next-pagination">
                                    <use xlink:href="#arrow-right-slider">
                                        <svg id="arrow-right-slider" data-name="Layer 1"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 13">
                                            <path d="M0,0V13L12,6.5ZM1.35,2.28,9.14,6.5,1.35,10.72Z"></path>
                                        </svg>
                                    </use>
                                </svg>-->
                    <ul class="pagination">
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
                    </ul>
                   <!-- <div class="d-flex align-items-center justify-content-center c-pagination__top-custom mt-2 mt-sm-0" data-control-type="ArticleList">

                        <div class="c-btn c-btn&#45;&#45;white-round" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                            <a class="" href="" @click="fetchProducts(pagination.prev_page_url)">


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
    <input class="c-input c-input&#45;&#45;top-pagination text-right p-2 mx-3" value="2" data-bind="enter: $element.blur(), event: { blur: onChangePage.bind($root, $element.value, 10) }">
  </span>
                        <div class="c-btn c-btn&#45;&#45;white-round">
                            <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO5&amp;segment1=amort-montavimo-elementai&amp;page=3">


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
    <a class="" href="https://www.rm-autodalys.eu/katalog?nodeId=AMO5&amp;segment1=amort-montavimo-elementai&amp;page=10" title="10">10</a>
  </span>
                    </div>-->


                </div>

            </div>
            <div class="c-products">
                <div class="c-panel c-panel--flatten" v-for="product in products" v-bind:key="product_id">
                    <div class="row my-3 pt-2 pr-3 pb-2 pl-2">
                        <div class="col-12 c-product-image-col d-flex align-items-center mx-auto">
                            <div class="c-product-image" data-control-type="Blank">
                                <div class="c-product-image__slides">
                                    <div class="c-product-image__slide">
                                        <a class="c-product-image__link"
                                           href="https://www.rm-autodalys.eu/api/media/stock-article-image?fileName=A73001B-01.jpg"
                                           data-toggle="lightbox" data-gallery="/slopintuvas-spyruokl-s--a73001b">
                                            <img class="c-product-image__image"
                                                 src="/storage/images/no_photo_500.jpg"
                                                 alt="SLOPINTUVAS SPYRUOKLĖS">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr--vertical d-none d-sm-block">
                        <div class="col">
                            <h3 class="c-product__title c-product__title--light d-flex justify-content-start border-bottom pb-2 mb-2">
                                <a v-bind:href=" '/product/' + product.reference"
                                 v-bind:title="product.name">{{product.name}}</a>
                            </h3>
                            <div class="row">
                                <div class="col d-flex flex-column align-items-start">

                                    <p class="c-product__display-code">
                                        <span>Prekės kodas:</span>
                                        <span>{{product.reference}}</span>
                                    </p>

                                    <div class="c-product__description mb-3">

                                        {{product.short_description}}
                                    </div>

                                    <div class="c-product-stock d-flex flex-column order-1 order-sm-2">
                                        <div class="c-product-stock d-flex flex-column">


                                            <small class="d-block text-muted text-uppercase c-product-stock__text">
                                                <span>Prieinamumas</span>
                                            </small>
                                            <div class="d-flex flex-column flex-xl-row">
                                                <div
                                                    class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                                    <span class="c-product-stock__name mr-2">Parduotuvė</span>
                                                    <span class="c-product-stock__availability">{{product.stock_shop}}
                                                        <span class="ml-1">vnt</span>
                                                    </span>
                                                </div>
                                                <div
                                                    class="c-product-stock-container d-flex justify-content-center align-items-center pl-0">
                                                    <span class="c-product-stock__name mr-2">Sandėlis</span>
                                                    <span class="c-product-stock__availability c-product-stock__availability--more">&gt;{{product.stock_supplier}}
                                                        <span class="ml-1">vnt</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div
                                            class="col col-sm-12 order-2 order-sm-1 d-flex flex-column align-items-end">
                                            <div class="d-flex align-items-center">
                                                <div class="c-product__price-gross">
                                                    {{product.price*1.21}}
                                                    €
                                                </div>
                                            </div>
                                            <div class="c-product__price-net">
                                                / {{product.price}}
                                                €
                                                <span>be PVM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end align-items-end">
                                        <div type="ADD_TO_CART" data-control-type="Order">
                                            <form action="/cart" method="post">
                                                <!--{{csrf_field()}} action="{{route('cart.store')}}" -->
                                                <div class="d-flex">
                                                    <input type="hidden" name="_token" v-bind:value="csrf">
                                                    <input class="c-input c-input--quantity c-input--no-border" autocomplete="off" data-bind="" min="1" name="amount" step="1" type="number" value="1">
                                                    <input type="hidden" name="id" v-bind:value="product.id">

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


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <ul class="pagination">
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
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Products",
        data() {
            return {
                products: [],
                product: {
                    id: '',
                    name: '',
                    reference: '',
                    stock_shop: '',
                    stock_supplier: '',
                    short_description: '',
                    price: ''
                },
                input_page: '',
                product_id: '',
                pagination: {},
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                edit: false
            }
        },
        created() {
            this.fetchProducts();
        },
        methods: {
            fetchProducts(page_url) {
                let vm = this;
                page_url = page_url || 'api/products'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.products = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev

                }
                this.pagination = pagination;
            }
        }


    }
</script>

<style scoped>

</style>
