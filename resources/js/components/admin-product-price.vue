<template>
    <div>
        <input type="text" class="form-control" v-model="search">
        <div id="quick-search-autocomplete-dropdown" class="c-input-dropdown__quick-search c-input-dropdown" style="display: block; min-width: 450px;">
            <ul class="c-input-dropdown__items" v-if="products.length > 0">
                <a v-for="product in products" v-bind:href=" '/products/' + product.reference">
                    <li class="c-input-dropdown__item" style="font-weight: 600;">
                        {{product.reference}} - {{product.name}}
                    </li>
                </a>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "admin-product-price",
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
            this.debouncedGetAnswer = _.debounce(this.getProducts, 650);
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
                        return axios.post(window.location.origin + '/api/products/search', {search: this.search})
                            .then(function (response) {
                                //console.log(response.data);
                                this.products = response.data;
                            }.bind(this));
                    }
                }
            },
            submit() {
               /* if (this.search.length > 3 && this.user) {
                    window.location.href = window.location.origin + "/products?search=" + this.search + "&flag=1";

                }*/
            }
    }
</script>

<style scoped>

</style>
