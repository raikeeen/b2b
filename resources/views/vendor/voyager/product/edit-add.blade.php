@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">


            <div class="panel-bordered">
                <!-- form start -->
                <form role="form"
                      class="form-edit-add"
                      action="{{ route('voyager.product.createNew') }}"
                      method="POST" enctype="multipart/form-data">



                    <div class="col-md-12 product-header-panel">
                       @include('layouts.errors')

                    <div class="panel panel panel-bordered panel-warning container-fluid">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <input required="" type="text" class="form-control product-head-text" id="name" name="name" placeholder="Pavadinimas" value="{{$product->name ?? ''}}">
                            </div>
                        </div>
                    </div>

                    </div>
                    {{ csrf_field() }}
                    <div class="panel-body content-center">
                        <div class="col-md-8 panel panel-bordered" style="padding-top: 22px;">

                        <!-- Adding / Editing -->
                            @if($edit)
                                <div style="padding-bottom: 50px">
                                <input type="text" name="put" value="put" hidden>
                                <input type="text" name="product_id" value="{{$product->id}}" hidden>
                                <div class="dropzone fallback" id="dropzone"></div>
                                </div>
                            @else
                            <div id="fileUpload1" style="padding-bottom: 50px">
                                <input hidden id="file" name="file"/>
                            <div class="dropzone dropzone-file-area fallback" id="fileUpload">
                                <div class="dropzone-previews"></div>
                            </div>
                            </div>
                            @endif



                                <div class="form-group col-md-6 product-form">
                                    <label class="control-label product-label" for="name">Kodas:</label>
                                    <input required="" id="reference" type="text" class="form-control product-code" name="reference" placeholder="Kodas" value="{{$product->reference ?? ''}}">
                                </div>
                                <div class="form-group  col-md-6 product-form">
                                    <label class="control-label product-label" for="name">Tiekėjo kodas:</label>
                                    <input required="" id="supplier_reference" type="text" class="form-control product-code" name="supplier_reference" placeholder="Kodas" value="{{$product->supplier_reference ?? ''}}">
                                </div>

                                <div class="form-group  col-md-6 product-form">
                                    <div class="row" style="padding-left: 15px">
                                        <label class="control-label" for="name">Tiekėjas:</label>
                                    </div>
                                    <select class="form-control" name="supplier" id="supplier">

                                        @foreach($supplier as $sup)
                                            <option value="{{$sup->id}}" @if($sup->id == ($product->supplier_id ?? '')) selected="selected"@endif">{{$sup->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  col-md-6 product-form">
                                    <label class="control-label" for="name">B1 id:</label>
                                    <input type="text" class="form-control" id="b1_id" name="b1_id" placeholder="Id" value="{{$product->b1_product_id ?? ''}}">
                                </div>
                                <div class="form-group  col-md-12 ">
                                    <label class="control-label" for="name">Aprašymas:</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Aprašymas" value="{{$product->short_description ?? ''}}">
                                </div>
                                <div class="form-group  col-md-6 product-form">
                                    <label class="control-label" for="name">Likutis Parduotuve:</label>
                                    <input required="" type="number" class="form-control" id="stock_shop" name="stock_shop" placeholder="Likutis" value="{{$product->stock_shop ?? 0}}">
                                </div>
                                <div class="form-group  col-md-6 product-form">
                                    <label class="control-label" for="name">Likutis Tiekėjas:</label>
                                    <input required="" type="number" class="form-control" id="stock_supplier" name="stock_supplier" placeholder="Likutis" value="{{$product->stock_supplier ?? 0}}">
                                </div>

                        </div>
                        <div class="col-md-3" style="padding-right: 0">
                            @if($edit)
                            <div class="panel panel-bordered panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon wb-search"></i> Kaina kliento</h3>
                                    <div class="panel-actions">
                                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="app">
                                        <admin-product-price></admin-product-price>
                                    </div>
                                    <script src="{{asset('js/app.js')}}" crossorigin="anonymous"></script>
                                </div>
                            </div>
                            @endif
                            <div class="panel panel panel-bordered panel-warning panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon wb-clipboard"></i> Margin</h3>
                                    <div class="panel-actions">
                                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group product-form">
                                        <label class="product-label big-text" for="slug">Price stock netto:</label>
                                        <input required="" type="number" step="0.01" id="price" class="product-price" name="price" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->price_base ?? '0.00'}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text product-symbol"> €</span>
                                        </div>
                                    </div>
                                    <div class="row padding-left">
                                        <span class="product-label big-text">Servisas</span>
                                        <span class="product-label big-text float-right">Parduotuve</span>
                                    </div>
                                    <hr class="hr-grey">
                                    <label class="product-label" for="slug">Tiekejo maržos:</label>
                                        <div class="row padding-left">
                                            <div class="float-left">
                                                <input disabled type="number" step="0.01" id="supplier_margin" class="product-price" name="supplier_margin" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->supplier->margin ?? '0.00'}}">
                                                <div class="input-group-append float-right margin-top">
                                                    <span class="input-group-text product-symbol display-inline"> %</span>
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <input disabled type="number" step="0.01" id="supplier_margin" class="product-price" name="supplier_margin_pard" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->supplier->margin_pard ?? '0.00'}}">
                                                <div class="input-group-append float-right margin-top">
                                                    <span class="input-group-text product-symbol display-inline"> %</span>
                                                </div>
                                            </div>
                                        </div>
                                    <label class="product-label" for="slug">Kategorijos:</label>

                                    <div class="row padding-left">
                                        <div class="float-left">
                                            <input disabled type="number" step="0.01" class="product-price" id="category_margin" name="category_margin" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product->category[0]) ? $product->category[0]->trade_margin : '0.00'}}">

                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <input disabled type="number" step="0.01" class="product-price" id="category_margin" name="category_margin_pard" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product->category[0]) ? $product->category[0]->trade_margin_pard : '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="product-label" for="slug">Prėke:</label>

                                    <div class="row padding-left">
                                        <div class="float-left">
                                            <input required="" type="number" step="0.01" class="product-price" id="product_margin" name="product_margin" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->trade_margin ?? '0.00'}}">

                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <input required="" type="number" step="0.01" class="product-price" id="product_margin_pard" name="product_margin_pard" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->trade_margin_pard ?? '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="product-label" for="slug">Globalus:</label>
                                    <div class="form-group product-form">
                                        <select required="" class="product-price" name="margin" id="margin">
                                            @foreach($margin as $mar)
                                                <option value="{{$mar->id}}" @if($mar->id == ($product->margin_id ?? '')) selected="selected" @endif>{{$mar->value}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text product-symbol"> %</span>
                                        </div>
                                    </div>

                                    <div class="row padding-left">
                                        <label class="product-label big-text float-left" for="slug">Sum:</label>
                                        <label class="product-label big-text float-right" style="padding-right: 0" for="slug">Pard nuolaida -15%:</label>
                                    </div>
                                    <div class="row padding-left">
                                        <div class="float-left">
                                            <input disabled type="number" step="0.01" class="product-price" name="all" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product) ? $product->commonsMargin() : '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <input disabled type="number" step="0.01" class="product-price" name="all" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product) ? $product->commonsMarginPard() : '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> %</span>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="product-label big-text" for="slug">Add price:</label>
                                    <div class="form-group product-form">
                                        <input required type="number" step="0.01" class="product-price" name="price_add" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product) ? $product->price_add : '0.00'}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text product-symbol"> €</span>
                                        </div>
                                    </div>
                                    <hr class="hr-grey">
                                    <label class="product-label" for="slug">Kaina be pvm:</label>
                                    <div class="row padding-left">
                                        <div class="float-left">
                                            <input required type="number" step="0.01" class="product-price" id="price_estimate" name="price_estimate" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{$product->price ?? '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> €</span>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <input required type="number" step="0.01" class="product-price" id="price_estimate" name="price_estimate_pard" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" @if(isset($product)) value="{{$product->PricePard()  ?? '0.00'}}" @else value="0.00" @endif>
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> €</span>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="product-label" for="slug">Kaina su pvm:</label>
                                    <div class="row padding-left">
                                        <div class="float-left">
                                            <input disabled type="number" step="0.01" class="product-price" id="show-price-with-vat" name="show-price-with-vat" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product) ? App\Models\Tax::priceWithTax($product->price) : '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> €</span>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <input disabled type="number" step="0.01" class="product-price" id="show-price-with-vat" name="show-price-with-vat-pard" placeholder="0.00" data-slug-origin="title" data-slug-forceupdate="true" value="{{isset($product) ? App\Models\Tax::priceWithTax($product->PricePard()) : '0.00'}}">
                                            <div class="input-group-append float-right margin-top">
                                                <span class="input-group-text product-symbol display-inline"> €</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bordered panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon wb-search"></i> Categories</h3>
                                    <div class="panel-actions">
                                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <label class="form-control-label text-uppercase bold">Susietos kategorijos</label>
                                    <div id="ps_categoryTags" class="pstaggerTagsWrapper" style="display: block;">

                                    </div>
                                    <div class="form-group">
                                        <ul class="category-tree" style="margin-left: -20px;">
                                            @foreach($categories as $category)
                                                <li class="less">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="category" data-id="{{$category->id}}" data-name="{{$category->name}}" name="category[]" value="{{$category->id}}"
                                                                   class="category" {{(isset($categoriesForProduct) ? $categoriesForProduct->contains($category) : '') ? 'checked': ''}}>
                                                            {{$category->name}}
                                                        </label>
                                                    </div>
                                                    @if(isset($category->children))
                                                        <ul>
                                                            @foreach($category->children as $category)
                                                                @include('partials.minicategoryadmin', ['category' => $category, 'categoriesForProduct' => isset($categoriesForProduct) ? $categoriesForProduct : []])
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- panel-body -->

                    <div class="panel-footer product-footer">
                        <div class="col-md-4"></div>
                        <div class="col-sm-5 col-md-8 text-right" style="padding-right: 6%;">
                            @section('submit-buttons')
                                <button type="submit" id="save" class="btn btn-primary save">{{ __('Išsaugoti') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </div>
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                      enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file"
                           onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>

            </div>

        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    @if($edit)
    <script>

            $('#supplier').select2();
            // Dropzone.options.Dropzone = {
            //     // Configuration options go here
            // };
            var myDropzone = new Dropzone("div#dropzone", {
                url: "{{route('add-image', $product->id)}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dictFileTooBig: 'Image is larger than 16MB',
                paramName: 'file',
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                addRemoveLinks: true,
                maxFiles: 8,
                parallelUploads: 1,
                maxFilesize: 16,
                init: function () {
                    let myDropzone = this;
                    let callback = null; // Optional callback when it's done
                    let crossOrigin = null; // Added to the `img` tag for crossOrigin handling
                    let resizeThumbnail = false; // Tells Dropzone whether it should resize the image first
                    let existingFiles = {!! $img !!};

                    if (existingFiles.length > 0) {
                        for (i = 0; i < existingFiles.length; i++) {
                            myDropzone.displayExistingFile(existingFiles[i], window.location.origin + '/' + existingFiles[i].file, callback, crossOrigin, resizeThumbnail);
                        }
                    }
                    this.on("removedfile", function (file) {
                        $.post({
                            url: '{{route('delete-image', $product->id)}}',
                            data: {
                                id: file.previewElement.querySelector("[data-dz-name]").textContent,
                                product: {{$product->id}},
                                _token: $('meta[name="csrf-token"]').attr('content'),
                            },
                            dataType: 'json',
                            success: function (data) {

                            }
                        });
                    });
                },
                success: function (file, response) {
                    var fileuploded = file.previewElement.querySelector("[data-dz-name]");
                    fileuploded.innerHTML = response;
                }
            });
            Dropzone.autoDiscover = false;

            let ps_tag = $('#ps_categoryTags');
            $('input:checked').each(function () {
                ps_tag.prepend('<span class="pstaggerTag">\n' +
                    '                <span class="font-weight-bold">' + $(this).data("name") + '</span>\n' +
                    '                <a class="pstaggerClosingCross" href="JavaScript:void(0)" data-id=' + $(this).data("id") + '>x</a>\n' +
                    '                </span>');
            });
            $(document).on("click", ".pstaggerClosingCross", function(e) {
                let id = $(this).data("id");
                console.log($(this));
                $(this).parent().remove();
                $('[data-id='+ id +']').click();
            });
           /* $('.pstaggerClosingCross').on('click', function() {
                let id = $(this).data("id");
                console.log($(this));
                $(this).parent().remove();
                $('[data-id='+ id +']').click();
            })*/


            $("input[type=checkbox]").click(function () {
                console.log($(this).val());
                if(this.checked) {
                    ps_tag.prepend('<span class="pstaggerTag">\n' +
                        '                <span class="font-weight-bold">' + $(this).data("name") + '</span>\n' +
                        '            <a class="pstaggerClosingCross" href="JavaScript:void(0)" data-id=' + $(this).data("id") + '>x</a>\n' +
                        '                </span>');
                }else {
                    $('a[data-id='+ $(this).data("id") +']').parent().remove();
                }})


    </script>
    @else
        <script>
            $('#supplier').select2();
            //var formData = new FormData();
            var myDropzone = new Dropzone("div#fileUpload", {

                url: 'blackHole.php',
                addRemoveLinks: true,
                previewsContainer: 'div.dropzone-previews',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                maxFiles:8,
                parallelUploads: 1,
                maxFilesize: 16,
                accept: function(file) {
                    let fileReader = new FileReader();

                    fileReader.readAsDataURL(file);
                    fileReader.onloadend = function() {

                        let content = fileReader.result;
                       // $('#file').val(content);
                        $('#fileUpload1').append('<input hidden name = "files[]" value =' + content + ' /> ');
                        file.previewElement.classList.add("dz-success");
                    }
                    file.previewElement.classList.add("dz-complete");
                }
            });

            Dropzone.autoDiscover = false;


        </script>
    @endif
@stop
