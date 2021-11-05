@extends('welcome')

@section('title','TecDoc')
@section('content')

    <div class="my-2">
        <h1 class="c-headline my-4">TecDoc</h1>
    </div>
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="vehicleinfo__container">
            <div class="vehicleinfo__panel">
                <img class="vehicleinfo__image js-vehicleinfo-image" src="{{asset('storage/images/empty_vehicle.png')}}">
                @if(!empty($modification))
                <div class="vehicleinfo__basics">
                    <ul style="padding: 0;">
                        <li class="vehicleinfo__item vehicleinfo__item--big js-global-vehicle-picker-trigger">
                            {{$modification['manuName']}}</li>
                        <li class="vehicleinfo__item vehicleinfo__item--big js-global-vehicle-picker-trigger">
                            {{$modification['modelName']}}</li>
                        <li class="vehicleinfo__item js-global-vehicle-picker-trigger">
                            {{$modification['typeName'].' ('.$modification['cylinderCapacityCcm'].' ccm / '.$modification['powerKwTo'].' kW / '.$modification['powerHpTo'].' AG)'}}
                            </li>
                    </ul>
                    <table class="vehicleinfo__table">
                        <tbody>
                            <tr>
                                <td class="vehicleinfo__tableitem">Production years:</td>
                                <td class="vehicleinfo__tableitem">{{$modification['years']}}</td>
                            </tr>
                            <tr>
                                <td class="vehicleinfo__tableitem">Engine codes:</td>
                                <td class="vehicleinfo__tableitem">CCZA, CAWB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="vehicleinfo__minimal">

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12">
        <div class="categoriestree__categories js-vehiclepage-categories-tree-categories row">
            <div class="categoriestree__column col-md-6 col-6 col-sm-12">
                {{--<div class="categoriestree__category js-vehiclepage-categories-tree-category" data-code="6100000" data-track-ga-event-action="ExpandFO" data-track-ga-event-label="AUDI, A3 Sportback (8VA, 8VF), Filters">
                    <div class="categoriestree__categoryimage js-vehiclepage-categories-tree-category-toggle"></div>
                    <div class="categoriestree__categoryname js-vehiclepage-categories-tree-category-toggle js-vehiclepage-categories-tree-keyboardable js-onboarding-vehicle-category">
                        Filters (84)
                        <div class="categoriestree__categorytoggle js-vehiclepage-categories-tree-category-toggle is-open"></div>
                    </div>
                    <hr class="categoriestree__separator">
                    <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories is-open was-opened"><div class="categoriestree__loading"></div><div class="categoriestree__subcategory js-vehiclepage-categories-tree-subcategory" data-code="6111000">
                            <div class="categoriestree__subcategorytoggle js-vehiclepage-categories-tree-subcategory-toggle"></div>
                            <div class="categoriestree__subcategoryname">
                                <a class="categoriestree__subcategoryanchor js-vehiclepage-categories-tree-keyboardable js-vehiclepage-categories-tree-focusable" href="/en/Full-offer/Filters/Oil-filter-casing-gasket/c/tecdoc-6100000-6111000?q=%3Adefault%3Avehicle%3ACAR_132930">
                                    Oil filter/casing/gasket<span class="categoriestree__subcategorycount">22</span><span class="categoriestree__subcategorylink"></span>
                                </a>
                            </div>
                            <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                        </div>
                        <div class="categoriestree__subcategory js-vehiclepage-categories-tree-subcategory" data-code="6113000">
                            <div class="categoriestree__subcategorytoggle js-vehiclepage-categories-tree-subcategory-toggle"></div>
                            <div class="categoriestree__subcategoryname">
                                <a class="categoriestree__subcategoryanchor js-vehiclepage-categories-tree-keyboardable js-vehiclepage-categories-tree-focusable" href="/en/Full-offer/Filters/Air-filter-casing-gasket/c/tecdoc-6100000-6113000?q=%3Adefault%3Avehicle%3ACAR_132930">
                                    Air filter/casing/gasket<span class="categoriestree__subcategorycount">14</span><span class="categoriestree__subcategorylink"></span>
                                </a>
                            </div>
                            <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                        </div>
                        <div class="categoriestree__subcategory js-vehiclepage-categories-tree-subcategory" data-code="6114000">
                            <div class="categoriestree__subcategorytoggle js-vehiclepage-categories-tree-subcategory-toggle"></div>
                            <div class="categoriestree__subcategoryname">
                                <a class="categoriestree__subcategoryanchor js-vehiclepage-categories-tree-keyboardable js-vehiclepage-categories-tree-focusable" href="/en/Full-offer/Filters/Cabin-filter-casing-gasket/c/tecdoc-6100000-6114000?q=%3Adefault%3Avehicle%3ACAR_132930">
                                    Cabin filter/casing/gasket<span class="categoriestree__subcategorycount">41</span><span class="categoriestree__subcategorylink"></span>
                                </a>
                            </div>
                            <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                        </div>
                        <div class="categoriestree__subcategory js-vehiclepage-categories-tree-subcategory" data-code="6115000">
                            <div class="categoriestree__subcategorytoggle js-vehiclepage-categories-tree-subcategory-toggle"></div>
                            <div class="categoriestree__subcategoryname">
                                <a class="categoriestree__subcategoryanchor js-vehiclepage-categories-tree-keyboardable js-vehiclepage-categories-tree-focusable" href="/en/Full-offer/Filters/Hydraulic-Filter/c/tecdoc-6100000-6115000?q=%3Adefault%3Avehicle%3ACAR_132930">
                                    Hydraulic Filter<span class="categoriestree__subcategorycount">7</span><span class="categoriestree__subcategorylink"></span>
                                </a>
                            </div>
                            <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                        </div>
                    </div>
                </div>
                --}}
                @foreach($categories as $category)
                    @if($loop->odd)
                    <div class="categoriestree__category js-vehiclepage-categories-tree-category" data-code="{{$category->getAssemblyGroupNodeId()}}" data-child="{{$category->getHasChilds()}}">
                        <div class="categoriestree__categoryimage js-vehiclepage-categories-tree-category-toggle"></div>
                        <a href="javascript:void(0)" class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between   categoriestree__categoryname js-vehiclepage-categories-tree-category-toggle js-vehiclepage-categories-tree-keyboardable js-onboarding-vehicle-category">
                            {{ucfirst($category->getAssemblyGroupName())}}
                            <div class="categoriestree__categorytoggle js-vehiclepage-categories-tree-category-toggle"></div>
                            @if($category->getHasChilds())
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
                                            <path
                                                d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                        </svg>
                                    </use>
                                </svg>
                            @endif
                        </a>
                        <hr class="categoriestree__separator">
                        <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                    </div>
                    @endif
                @endforeach

            </div>
            <div class="categoriestree__column col-md-6 col-6 col-sm-12">
                @foreach($categories as $category)
                    @if($loop->even)
                        <div class="categoriestree__category js-vehiclepage-categories-tree-category" data-code="{{$category->getAssemblyGroupNodeId()}}" data-child="{{$category->getHasChilds()}}">
                            <div class="categoriestree__categoryimage js-vehiclepage-categories-tree-category-toggle">

                            </div>
                            <a href="javascript:void(0)" class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between    categoriestree__categoryname js-vehiclepage-categories-tree-category-toggle js-vehiclepage-categories-tree-keyboardable js-onboarding-vehicle-category c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between">
                                {{ucfirst($category->getAssemblyGroupName())}}
                                <div class="categoriestree__categorytoggle js-vehiclepage-categories-tree-category-toggle">

                                </div>
                                @if($category->getHasChilds())
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
                                                <path
                                                    d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>
                                            </svg>
                                        </use>
                                    </svg>
                                @endif
                            </a>
                            <hr class="categoriestree__separator">
                            <div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function ($) {
            console.log(1)
            $(".categoriestree__category").one('click', function (e) {
                console.log(2)
                if( $(this).attr("data-child") ) {
                    console.log($(this))
                    let parentId = $(this).attr("data-code");
                    let cat = $(this).children('.categoriestree__subcategories');
                    /*$(this).children('.categoriestree__subcategories').css("display", "block");*/
                    /*let cat = $(this).children('.categoriestree__separator');*/
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();
                    var formData = {
                        parentId: parentId,
                        carId: {{isset($modification['carId']) ? $modification['carId'] : null}}
                    };
                    var type = "POST";
                    var ajaxurl = '{{route('ajax.getParentCategory')}}';
                    $.ajax({
                        type: type,
                        url: ajaxurl,
                        data: formData,
                        dataType: 'json',
                        success: function (data) {
                            /*cat.prepend('<div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>')*/
                            $.each(data, function (index, item) {
                                console.log(item);
                                //console.log(item);
                                cat.prepend('<a href="javascript:void(0)" style=" text-transform:capitalize;" class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between"' +
                                    ' data-code="' + item.assemblyGroupNodeId + '" data-child="' + item.hasChilds + '">' + item.assemblyGroupName + '</a>');
                                if(item.hasChilds){
                                    cat.children('a[data-code='+ item.assemblyGroupNodeId +']').prepend('<svg class="cat-icon-red">\n' +
                                        '                                        <use xlink:href="#category-show">\n' +
                                        '                                            <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"\n' +
                                        '                                                 viewBox="0 0 12 12">\n' +
                                        '                                                <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>\n' +
                                        '                                            </svg>\n' +
                                        '                                        </use>\n' +
                                        '                                    </svg>\n' +
                                        '                                    <svg class="cat-icon-blue">\n' +
                                        '                                        <use xlink:href="#category-hide">\n' +
                                        '                                            <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"\n' +
                                        '                                                 viewBox="0 0 10.5 10.5">\n' +
                                        '                                                <path\n' +
                                        '                                                    d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>\n' +
                                        '                                            </svg>\n' +
                                        '                                        </use>\n' +
                                        '                                    </svg>')
                                }
                                /*cat.after('<div class="categoriestree__subcategories"' +
                                    ' data-code="' + item.assemblyGroupNodeId + '" data-child="' + item.hasChilds + '">' + item.assemblyGroupName + '</div>');*/
                            });
                            console.log(data);
                            //don't forget error handling!
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
                $('#categoriestree__category').off('click');
            })
            // getModels
            document.onclick = function( e ) {
                console.log(e.target);

                let element = $('a[data-code=' + e.target.getAttribute("data-code") + ']')
                console.log(element.attr('data-code'));
                    if ( e.target.getAttribute("data-child")) {
                        console.log(4)
                        let parentId = element.attr("data-code");
                        /*$(this).children('.categoriestree__subcategories').css("display", "block");*/
                        /*let cat = $(this).children('.categoriestree__separator');*/
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        e.preventDefault();
                        var formData = {
                            parentId: parentId,
                            carId: {{isset($modification['carId']) ? $modification['carId'] : null}}
                        };
                        var type = "POST";
                        var ajaxurl = '{{route('ajax.getParentCategory')}}';
                        $.ajax({
                            type: type,
                            url: ajaxurl,
                            data: formData,
                            dataType: 'json',
                            success: function (data) {
                                /*cat.prepend('<div class="categoriestree__subcategories js-vehiclepage-categories-tree-subcategories"></div>')*/
                                element.after('<div class="sub" data-code="'+ parentId +'" style="margin-left: 20px"></div>');
                                $.each(data, function (index, item) {
                                    console.log(item);
                                    //console.log(item);
                                    $('.sub[data-code='+ item.parentNodeId +']').prepend('<a href="javascript:void(0)" style=" text-transform:capitalize;" class="c-category-menu__symbol dropdown-toggle-split d-flex align-items-center justify-content-between"' +
                                        ' data-code="' + item.assemblyGroupNodeId + '" data-child="' + item.hasChilds + '">' + item.assemblyGroupName + '</a>');
                                    if (item.hasChilds) {
                                        $('.sub[data-code='+ item.parentNodeId +']').children('a[data-code=' + item.assemblyGroupNodeId + ']').prepend('<svg class="cat-icon-red">\n' +
                                            '                                        <use xlink:href="#category-show">\n' +
                                            '                                            <svg id="category-show" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"\n' +
                                            '                                                 viewBox="0 0 12 12">\n' +
                                            '                                                <path d="M12,7.37H7.37V12H4.63V7.37H0V4.63H4.63V0H7.37V4.63H12Z"></path>\n' +
                                            '                                            </svg>\n' +
                                            '                                        </use>\n' +
                                            '                                    </svg>\n' +
                                            '                                    <svg class="cat-icon-blue">\n' +
                                            '                                        <use xlink:href="#category-hide">\n' +
                                            '                                            <svg id="category-hide" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"\n' +
                                            '                                                 viewBox="0 0 10.5 10.5">\n' +
                                            '                                                <path\n' +
                                            '                                                    d="M10.46,2,7.19,5.25l3.27,3.27L8.52,10.46,5.25,7.19,2,10.46,0,8.52,3.31,5.25,0,2,2,0,5.25,3.31,8.52,0Z"></path>\n' +
                                            '                                            </svg>\n' +
                                            '                                        </use>\n' +
                                            '                                    </svg>')
                                    }
                                    /*cat.after('<div class="categoriestree__subcategories"' +
                                        ' data-code="' + item.assemblyGroupNodeId + '" data-child="' + item.hasChilds + '">' + item.assemblyGroupName + '</div>');*/
                                });
                                console.log(data);
                                //don't forget error handling!
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    }
            }

        });
    </script>
</div>

@endsection
