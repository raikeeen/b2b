<template>
        <div class="" data-asp-hook-name="HeaderQuickSearch">
            <div data-control-type="QuickSearch">
                <div class="c-quick-search position-relative" @keyup.enter="submit()">

                        <input class="c-input c-input--quicksearch" placeholder="Ieškokite produkto pavadinimo ar kodo" maxlength="128" required="" v-model="search">

                            <div id="quick-search-autocomplete-dropdown" class="c-input-dropdown__quick-search c-input-dropdown" style="display: block; min-width: 450px;">
                                <ul class="c-input-dropdown__items" v-if="products.length > 0">
                                    <a v-for="product in products" v-bind:href=" '/products/' + product.reference">
                                        <li class="c-input-dropdown__item" style="font-weight: 600;">
                                            {{product.reference}} - {{product.name}}
                                        </li>
                                    </a>
                                </ul>
                            </div>

                        <button class="c-quick-search__button" type="submit" v-on:click="submit()">


                            <svg class="c-icon">
                                <use xlink:href="#search"></use>
                                <path d="M19,15.14A10.15,10.15,0,0,0,3,3,10.15,10.15,0,0,0,15.14,19l4.16,4.16a2.87,2.87,0,0,0,2,.86h0A2.3,2.3,0,0,0,23,23.33l.39-.38a2.61,2.61,0,0,0-.19-3.65Zm-14.47.64A8,8,0,0,1,10.15,2.17a8,8,0,0,1,8,8,8,8,0,0,1-2.33,5.64h0a8,8,0,0,1-11.27,0ZM21.8,21.41l-.38.39a.19.19,0,0,1-.12,0,.71.71,0,0,1-.46-.22l-3.9-3.91.38-.38h0l.38-.38,3.91,3.91C21.85,21.08,21.86,21.36,21.8,21.41Z"></path>
                            </svg>

                        </button>

                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "Search.vue",
        props: ['user'],
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
                edit: false,
                search: null
            }
        },
        created() {
            this.debouncedGetAnswer = _.debounce(this.getProducts, 650)
        },
        watch: {
            search: function(){

                if (this.search.length > 3) {

                    this.products = [];
                    this.products.push({
                        name: 'Kraunama',
                        reference: ''
                    });
                    this.debouncedGetAnswer();

                } else {
                    this.products = [];
                }
            }

        },
        methods: {
            getProducts: function() {
                if(this.search !== '') {
                    /*fetch('http://localhost:8000/api/products/search/' + this.search)
                        .then(res => res.json())
                        .then(res => {
                            this.products = res;
                        })
                        .catch(err => {
                            console.log(err);
                        });*/
                    if (this.user) {
                        axios.post(window.location.origin + '/api/products/history', {
                            search: this.search,
                            user: this.user
                        }).then(function (response) {

                        });
                        return axios.post(window.location.origin + '/api/products/search', {search: this.search})
                            .then(function (response) {
                                //console.log(response.data);
                                this.products = response.data;
                            }.bind(this));
                    }
                }
            },
            submit() {
                if (this.search.length > 3 && this.user) {
                    window.location.href = window.location.origin + "/products?search=" + this.search + "&flag=1";

                }
            }
        }
    }
</script>

<style scoped>

</style>
