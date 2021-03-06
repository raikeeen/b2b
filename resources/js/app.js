/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Products from "./components/Products";

require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('product', require('./components/Product.vue').default);
Vue.component('products', require('./components/Products.vue').default);
Vue.component('search', require('./components/Search.vue').default);
Vue.component('product-panel', require('./components/Product-panel').default);
Vue.component('catalog-tecdoc', require('./components/catalogTecDoc').default);
Vue.component('tree-item-cat', require('./components/tree-item-cat').default);
Vue.component('user-spec-price', require('./components/user-spec-price').default);
Vue.component('admin-product-price', require('./components/admin-product-price').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const product = new Vue({
    el: '#app-panel',
});
