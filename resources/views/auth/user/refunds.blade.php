@extends('welcome')

@section('title','Grąžinimai')
@section('content')
    {{ Breadcrumbs::render('refunds') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">
        <span>Grąžinimai</span>
    </h1>
    <div class="mb-5">
        <!-- Nav tabs -->
        <ul class="nav c-headline c-nav" role="tablist" id="myTab">
            <li class="c-nav__item mr-2">
                <a class="c-nav__item-link active" data-toggle="tab" data-target="#consideredReturns" title="Užbaigti grąžinimai">
                    <span>Užbaigti grąžinimai</span>
                </a>
                <span data-bind="if: consideredReturnsLoaded(), attr: { hidden: false }">
            (<span data-bind="text: consideredReturns().length">0</span>)
          </span>
            </li>
            <li class="c-nav__item mr-3">
                <a class="c-nav__item-link" data-toggle="tab" data-target="#pendingReturns" title="Nerealizuoti grąžinimai">
                    <span>Nerealizuoti grąžinimai</span>
                </a>
                <span data-bind="if: pendingReturnsLoaded(), attr: { hidden: false }">
          (<span data-bind="text: pendingReturns().length">0</span>)
        </span>
            </li>
            <li class="c-nav__item">
                <a class="c-nav__item-link" data-toggle="tab" data-target="#new" title="+ Pridėk naują grąžinimą">
                    <span>+ Pridėk naują grąžinimą</span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane active" id="consideredReturns" role="tabpanel">

                <div data-bind="if: !consideredReturnsLoaded()"></div>
                <div data-bind="if: consideredReturnsLoaded(), attr: { hidden: false }">
                    <div class="my-5" data-bind="if: !consideredReturns().length">
                        <span class="c-headline mb-4"><span>Nėra išrinktų pozicijų</span></span>
                    </div>
                    <div data-bind="if: consideredReturns().length, attr: { hidden: false }"></div>
                </div>

            </div>
            <div class="tab-pane" id="pendingReturns" role="tabpanel">

                <div data-bind="if: !pendingReturnsLoaded()"></div>
                <div data-bind="if: pendingReturnsLoaded(), attr: { hidden: false }">
                    <div class="my-5" data-bind="if: !pendingReturns().length">
                        <span class="c-headline mb-4"><span>Nėra išrinktų pozicijų</span></span>
                    </div>
                    <div data-bind="if: pendingReturns().length, attr: { hidden: false }"></div>
                </div>

            </div>
            <div class="tab-pane" id="new" role="tabpanel">
                <div class="c-tile c-tile--h-auto mt-4">
                    <div class="c-tile__name">
                        <span>Grąžinamų prekių paieška</span>
                    </div>
                    <div class="c-tile__content">
                        <div data-bind="if: !selectedArticlesLoaded()">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p><span>Paieška pagal dokumentą:</span></p>
                                    <input class="c-input c-input--flat c-page-header__search-input" type="text" placeholder="ID" data-bind="value: searchByDocumentId, valueUpdate: 'afterkeydown', inputDropdown: 'search-by-document-dropdown'">
                                    <div id="search-by-document-dropdown" data-bind="css: { 'c-input-dropdown': searchByDocumentId().length > 1 }, attr: { hidden: false }" input-dropdown="">
                                        <!-- ko if: !articlesLoaded() && searchByDocumentId().length > 1 --><!-- /ko -->
                                        <!-- ko if: articlesLoaded() && searchByDocumentId().length > 1 --><!-- /ko -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-bind="if: showSelectedArticles(), attr: { hidden: false }"></div>
                    </div>
                </div>
                <div data-bind="if: buffer().length > 0, attr: { hidden: false }"></div>
            </div>
        </div>
    </div>
@endsection
