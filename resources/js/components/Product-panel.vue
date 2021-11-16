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
                    <span class="">{{oe['code']}}</span>
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
        <div class="pb-2 mt-3 mt-sm-0" v-if="manu.length">
            <div class="row">
                <div class="col-md-6 col-sm-12 accordion-container">
                    <div class="accordion-set">

                        <div class="accordion-button" v-for="manufacturer in manu" v-bind:data-id="manufacturer['manuId']" v-on:click="openCat()">
                            <div class="row">
                                <div class="icon-product">
                                </div>
                                <span>
                                    <a id="manu" onclick="return false" href="">
                                        <svg class="cat-icon-red" v-if="responce">
                                        <use xlink:href="#category-show">
                                            <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 12 12">
                                                <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>
                                            </svg>
                                        </use>
                                    </svg>
                                    <svg class="cat-icon-blue" v-else>
                                        <use xlink:href="#category-hide">
                                            <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.5 10.5">
                                                <path d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                            </svg>
                                        </use>
                                    </svg>
                                        {{manufacturer['name']}}</a>
                                </span>
                            </div>
                        </div>
                        <div class="accordion-content" data-car-type="pkw">
                            <ul>
                                <tree-item
                                    class="item"
                                    :item="treeData"
                                    @make-folder="makeFolder"
                                    @add-item="addItem"
                                ></tree-item>
                                <li>
                                    <b class="button_dropdown_list active loaded" data-maker="36" data-model="5541" data-prod="9445395">
                                        <i class="icon arrow arr_down"></i>FORD Galaxy Mk2 (WA6) MPV (Pagaminimo metai 05.2006 - 06.2015, 140 - 175 AG, dyzelinas)
                                    </b>
                                    <ul class="dropdown_list" style="display: block;">
                                        <li>2.0 TDCi, Pagaminimo metai 05.2006 - 06.2015, 1997 ccm, 140 AG</li>
                                        <li>2.0 TDCi, Pagaminimo metai 03.2010 - 06.2015, 1997 ccm, 163 AG</li>
                                        <li>2.2 TDCi, Pagaminimo metai 03.2008 - 12.2012, 2179 ccm, 175 AG</li>
                                    </ul>
                                </li>
                                <li>
                                    <b class="button_dropdown_list" data-maker="36" data-model="6238" data-prod="9445395">
                                        <i class="icon arrow"></i>FORD Mondeo Mk4 Hatchback (BA7) (Pagaminimo metai 03.2007 - 01.2015, 130 - 163 AG, dyzelinas)
                                    </b>
                                </li>
                                <li>
                                    <b class="button_dropdown_list" data-maker="36" data-model="6237" data-prod="9445395"><i class="icon arrow"></i>FORD Mondeo Mk4 Sedanas (BA7) (Pagaminimo metai 03.2007 - 01.2015, 115 - 163 AG, dyzelinas)</b>
                                </li>
                                <li>
                                    <b class="button_dropdown_list" data-maker="36" data-model="6239" data-prod="9445395"><i class="icon arrow"></i>FORD Mondeo Mk4 Universalas (BA7) (Pagaminimo metai 03.2007 - 01.2015, 115 - 163 AG, dyzelinas)</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center my-5 py-5" v-else-if="responce">
            <span class="c-headline">
                <span>Kraunama</span>
            </span>
        </div>
        <div class="text-center my-5 py-5" v-else>
            <span class="c-headline">
                <span>Automobiliu nerasta</span>
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
                manuId: '',
                treeData: treeData,
                responce: true
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
                        this.articleId = response.data['article'];
                        this.supplier_reference = response.data['supplier_reference'];
                    }.bind(this));
            },
            getManuId(link,reference_code) {
                return axios.post(link, reference_code)
                    .then(function( response ){
                        this.manu = response.data;
                        this.treeData['children'] = response.data;

                    }.bind(this));
            },
            makeFolder: function(item) {
                Vue.set(item, "children", []);
                this.addItem(item);
            },
            addItem: function(item) {
                item.children.push({
                    name: "new stuff"
                });
            }

        }
    }


    let treeData = {
        name: "Cars",
        children: [

        ]
    };
    Vue.component("tree-item", {
        template: ' <li>\n' +
            '        <div\n' +
            '          :class="{bold: isFolder}"\n' +
            '          @click="toggle"\n' +
            '          <a href="javascript:void(0)">{{ item.name }}\n' +
            '          <span v-if="isFolder">[{{ isOpen ? \'-\' : \'+\' }}]</span></a>\n' +
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
            '        </ul>\n' +
            '      </li>',
        props: {
            item: Object
        },
        data: function() {
            return {
                isOpen: false
            };
        },
        computed: {
            isFolder: function() {
                return this.item.children && this.item.children.length;
            }
        },
        methods: {
            toggle: function() {
                //console.log(this.item);
                //this.getParentModel(window.location.origin + '/ajax/getCars',{ article: this.articleId, manuId: this.manuId});
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
            getParentModel(link,reference_code) {
                return axios.post(link, reference_code)
                    .then(function( response ){
                        console.log(response)

                    }.bind(this));
            },
        }
    });
</script>

<style scoped>

</style>
