<template>
<div class="row" style="padding: 15px 50px">

        <table class="table table-bordered" style="width: 30%;float: left;">
        <thead>
        <tr>
            <th>Preke</th>
            <th>Margin</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="newTableRow">
            <td>
                <div>
                    <input type="text" name="product" class="form-control" value="" v-model="search">
                    <div id="quick-search-autocomplete-dropdown" class="c-input-dropdown__quick-search c-input-dropdown" style="display: block; min-width: 450px;">
                    <ul class="c-input-dropdown__items" v-if="products.length > 0">
                        <a v-for="product in products" >
                            <li class="c-input-dropdown__item" style="font-weight: 600;">
                                {{product.reference}} - {{product.name}}
                            </li>
                        </a>
                    </ul>
                    </div>
                </div>
            </td>
            <td>
                <input type="number" step="any" class="form-control">
            </td>
            <td style="min-width: 120px">
                <div class="btn btn-success add-row"><i class="voyager-check"></i></div>
                <div class="btn btn-danger delete-row"><i class="voyager-trash"></i></div>
            </td>
        </tr>
        </tbody>
    </table>
        <table class="table table-bordered" style="width: 30%;float: right;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr class="newTableRow">
                <td>
                    <div>
                        <select class="form-control">
                            <option value="">preke</option>
                        </select> <!---->
                    </div>
                </td>
                <td>
                    <input type="number" step="any" class="form-control">
                </td>
                <td>
                    <div class="btn btn-danger delete-row"><i class="voyager-trash"></i></div>
                </td>
            </tr>
            </tbody>
        </table>


</div>
</template>

<script>
    export default {
        name: "user-spec-price",
        props: ['user','references','categories'],
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
                    return axios.post(window.location.origin + '/api/products/search', {search: this.search})
                        .then(function (response) {
                            //console.log(response.data);
                            this.products = response.data;
                        }.bind(this));
                }
            },
        }
    }
</script>

<style scoped>

    .c-input-dropdown {
        position: absolute;
        display: block;
        z-index: 101;
        left: 0px;
        right: 0px;
        background: #fff;
        margin: 2px auto;
        padding: 0;
        overflow-x: hidden;
        overflow-y: auto;
        max-height: 235px;
        border: 1px solid #f5f5f5;
        border-top: none;
    }
    .c-input-dropdown__items {
        margin: 0;
        padding: 0;
    }
</style>
