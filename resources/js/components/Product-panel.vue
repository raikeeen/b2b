<template>
    <div class="col-12 tabs-border-after mt-4" data-control-type="ArticlePage">
        <ul class="nav" id="myTab" role="tablist">

            <li class="tabs-item">
                <a class="c-panel-tabs__item-link active px-2 py-1" data-toggle="tab" data-target="#oem" title="OEM kodai">
                    <span class="tabs-nav">OEM kodai</span>
                </a>
            </li>
            <li class="tabs-item">
                <a class="c-panel-tabs__item-link px-2 py-1" data-toggle="tab" data-target="#cars" title="Cars">
                    <span class="tabs-nav">Automobiliai</span>
                </a>
            </li>
            <li class="tabs-item">
                <a class="c-panel-tabs__item-link px-2 py-1" data-toggle="tab" data-target="#info" title="Info">
                    <span class="tabs-nav">Parametrai</span>
                </a>
            </li>
        </ul>
    <div class="tab-content c-panel c-panel--no-shadow mt-3 mt-sm-0" id="myTabContent">
    <div class="tab-pane active show" id="oem">
        <div class="oem" v-if="oem !== null">
            <div class="row font-weight-bold pt-1">
                <div class="col-4 u-bd-bottom-left u-bd-bottom-left--with-top text-uppercase py-2">
                    <span>Gamintojas</span>
                </div>
                <div class="col-8 u-bd-top-out text-uppercase py-2">
                    <span>OE kodai</span>
                </div>
            </div>

            <div class="row row--hover mb-0" v-for="oe in oem">
                <div class="col-4 u-bd-bottom-left py-2">
                    {{oe['name']}}
                </div>
                <div class="col-8 u-bd-top-out py-2">
                    <a v-bind:href="'/products?search='+ oe['code'] + '&flag=1'">{{oe['code']}}</a>
                </div>
            </div>
        </div>

        <div class="text-center my-5 py-5" v-else>
                                <span class="c-headline">
                                  <span>Kodu nerasta</span>
                                </span>
        </div>

    </div>
    <div class="tab-pane" id="cars">
        <div class="pb-2 mt-3 mt-sm-0" v-if="Object.keys(this.treeData).length">
            <div class="row">
                <div class="col-md-12 col-sm-12 accordion-container">
                    <div class="accordion-set">
                        <div class="accordion-content" data-car-type="pkw">
                            <div style="padding-top: 1.5rem">
                                <tree-item
                                    :class="{bold: isFolder}"
                                    class="item"
                                    v-for="(child, index) in treeData"
                                    :key="index"
                                    :item="child"
                                    @make-folder="makeFolder"
                                ></tree-item>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center my-5 py-5" v-else-if="responce">
            <span class="c-headline">
                <span>Kraunama</span>
                <span>
                    <img src="/storage/images/loading.gif" alt="">
                </span>
            </span>
        </div>
        <div class="text-center my-5 py-5" v-else>
            <span class="c-headline">
                <span>Automobiliu nerasta</span>
            </span>
        </div>
    </div>
        <div class="tab-pane" id="info">
            <div class="info" v-if="info !== null">

            <div class="row font-weight-bold pt-1">
                <div class="col-4 u-bd-bottom-left u-bd-bottom-left--with-top text-uppercase py-2">
                    <span>Pavadinimas</span>
                </div>
                <div class="col-8 u-bd-top-out text-uppercase py-2">
                    <span>Papildoma informacija</span>
                </div>
            </div>
                <div class="row row--hover mb-0" v-for="inf in info">
                    <div class="col-4 u-bd-bottom-left py-2">
                        {{inf['name']}}
                    </div>
                    <div class="col-8 u-bd-top-out py-2">
                        <span class="">{{inf['value']}}</span>
                    </div>
                </div>
            </div>
            <div class="text-center my-5 py-5" v-else>
                                <span class="c-headline">
                                  <span>Informacijos nerasta</span>
                                </span>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "product-panel.vue",
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                edit: false,
                oem: [],
                articleId: '',
                supplier_reference: '',
                manu: [],
                info: [],
                manuId: '',
                treeData: {

                },
                isFolder: true,
                responce: true,
                itemParent: {
                    normal: this.isFolder,
                    'text-danger': false,
                    paddingItem: true
                },
                isCarId: false
            }
        },
        async created() {
            const reference_code = { reference: document.getElementsByClassName("c-headline--light")[0].innerText };

            await this.getOeCodes(window.location.origin + '/ajax/getCarsAndOecodes',reference_code);
            const articleForm = { article: this.articleId };

            await this.getManuId(window.location.origin + '/ajax/getArticleManufacturer',articleForm);

        },
        methods: {
            getOeCodes(link,reference_code) {
                return axios.post(link, reference_code)
                    .then(function( response ){
                        this.oem = response.data['oe'];
                        this.info = response.data['info'];
                        this.articleId = response.data['article'];
                        this.supplier_reference = response.data['supplier_reference'];
                    }.bind(this));
            },
            getManuId(link,reference_code) {
                return axios.post(link, reference_code)
                    .then(function( response ){
                        this.treeData = response.data;
                        this.responce = false;
                    }.bind(this));
            },
            makeFolder: function(item) {
                Vue.set(item, "children", []);
                this.addItem(item);
            },

        }
    }

    Vue.component("tree-item", {
        template: '<li>\n' +
            '        <div\n' +
            '          :class=""\n' +
            '          @click="toggle"\n' +
            '          @dblclick="makeFolder">\n' +
            '          <span v-if="isFolder">{{ isOpen ? \'-\' : \'+\' }}</span>\n' +
            '          <span v-else>-</span>\n' +
            '          <span v-if="!isFolder">' +
            '<a v-bind:href="item.carId">'+
            '          {{ item.name }}\n' +
            '</a>'+
                    '</span>\n' +
            '          <span v-else>' +
            '          {{ item.name }}\n' +
            '</span>\n' +
            '        </div>\n' +
            '        <ul v-show="isOpen" v-if="isFolder">\n' +
            '          <tree-item\n' +
            '            class="item"\n' +
            '            v-for="(child, index) in item.children"\n' +
            '            :key="index"\n' +
            '            :item="child"\n' +
            '            @make-folder="$emit(\'make-folder\', $event)"\n' +
            '            @add-item="$emit(\'add-item\', $event)"\n' +
            '          ></tree-item>\n' +
            '          <li class="add" @click="$emit(\'add-item\', item)"></li>\n' +
            '        </ul>\n' +
            '      </li>',
        props: {
            item: Object
        },
        data: function() {
            return {
                isOpen: false,
                link: '#'
            };
        },
        computed: {
            isFolder: function() {
                return this.item.children && this.item.children.length;
            },
            linkCar: function () {
                this.link = 'http://localhost:8000/products/' + this.item.carId;
                return 'http://localhost:8000/products/' + this.item.carId;
            }
        },
        methods: {
            toggle: function() {
                if (this.isFolder) {
                    this.isOpen = !this.isOpen;
                }
            },
            makeFolder: function() {
                if (!this.isFolder) {
                    this.$emit("make-folder", this.item);
                    this.isOpen = true;
                }
            },
            isCarId: function () {

                if (this.item.carId !== undefined)
                    return 'http://localhost:8000/products/'+this.item.carId;
                return false;
            }
        }
    });
</script>

<style scoped>
    .item {
        cursor: pointer;
    }
    .bold {
        font-weight: bold;
    }
    .paddingItem {
        padding-bottom: 10px;
    }
    .normal {
        font-weight: normal;
    }


</style>
