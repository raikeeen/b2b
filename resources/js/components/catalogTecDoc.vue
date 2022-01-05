
<template>
    <div class="categoriestree__categories row">
        <!--<div class="col-md-6 col-6 col-sm-12 categoriestree__column ">
            <div v-for="(category, index,name) in cat">
                <div v-if="evenOrOdd(index) === true">
                    <a class="categoriestree__categoryname__tec" href="">{{category.name}}</a>
                    <span class="cat-name-span-red">+</span>
                    <span class="cat-name-span-blue">-</span>
                    <hr class="categoriestree__separator">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-6 col-sm-12 categoriestree__column">
            <div v-for="(category, index,name) in cat">
                <div v-if="evenOrOdd(index) === false">
                    <a class="categoriestree__categoryname__tec" href="">{{category.name}}</a>
                    <span class="cat-name-span-red">+</span>
                    <span class="cat-name-span-blue">-</span>
                    <hr class="categoriestree__separator">
                </div>
            </div>
        </div>-->
        <tree-item-cat :mod="mod"
                       v-for="(child, index) in root"
                       :key="index"
                       :node="child"
                       @onClick="nodeWasClicked">
        </tree-item-cat>
    </div>
</template>

<script>
    export default {
        name: "catalogTecDoc.vue",
        props: ['mod'],
        data() {
            return {
                root: {

                },
                baseUrl: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                cat: []
            }
        },
        created() {
            this.fetchFirstCat();
        },
        methods: {
            nodeWasClicked(node) {
                if(node) {


                    console.log('we are clicked');
                    alert(node.name);
                }
            },
            fetchFirstCat() {
                return axios.post(window.location.origin + '/vehicle/category', {modification: this.mod})
                     .then(function (response) {
                         this.root = response.data;
                }.bind(this));
            },
            evenOrOdd(num) {
                if (num % 2 === 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
