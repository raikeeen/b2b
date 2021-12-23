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
    @if(session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-bordered">
                    <div class="panel-title" style="font-weight: bold">
                        Užsakymas {{$order->reference." NR. ".$order->id}}
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="panel-title" style="font-weight: bold">
                        BŪSENA
                    </div>
                    <div class="panel-body">

                        <div class="tab-content panel">

                            <!-- Tab status -->
                            <div class="tab-pane active" id="status">
                                <h4 class="visible-print">Būsena <span class="badge">(3)</span></h4>
                                <!-- History of status -->
                                <div class="table-responsive">
                                    <table class="table history-status row-margin-bottom">
                                        <tbody>

                                        @foreach($statuses as $status)

                                        <tr @if($loop->first) style="background-color: @if(isset($status->status->color)) {{$status->status->color}} @else #FF8C00 @endif; color: black; font-weight: normal;" @else style="color: black; font-weight: normal;"  @endif>
                                            <td><img @if(!empty($status->status->img)) src="{{$status->status->img}}" @else src="{{asset('storage/images/dot.png')}}" @endif width="16" height="16" alt="{{$status->status->name}}"></td>
                                            <td>{{$status->status->name}}</td>
                                            <td></td>
                                            <td>{{$status->created_at}}</td>
                                            <td class="text-right">
                                                <a class="btn btn-default" title="Persiųsti šį laišką klientui">
                                                    <i class="icon-mail-reply"></i>
                                                    Pakartoti el. laiško siuntimą
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Change status form -->
                                <form action="{{route('status.update', $order->id)}}" method="post" class="form-horizontal well hidden-print">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <select id="id_order_state" class="chosen form-control" name="status_id">
                                                @foreach($allStatus as $status)
                                                    <option value="{{$status->id}}" @if($statuses->first()->status_id === $status->id) selected="selected"@endif>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submitState" id="submit_state" class="btn btn-primary">
                                                Atnaujinti būseną
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Tab documents -->
                            <div class="tab-pane" id="documents">
                                <h4 class="visible-print">Dokumentai <span class="badge">(1)</span></h4>
                                <div class="table-responsive">
                                    <table class="table" id="documents_table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <span class="title_box ">Data</span>
                                            </th>
                                            <th>
                                                <span class="title_box ">Dokumentas</span>
                                            </th>
                                            <th>
                                                <span class="title_box ">Numeris</span>
                                            </th>
                                            <th>
                                                <span class="title_box ">Suma</span>
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr id="delivery_2801">

                                            <td>2021-12-13</td>
                                            <td>
                                                Pristatymo kvitas
                                            </td>
                                            <td>
                                                <a class="_blank" title="Peržiūrėti dokumentą" href="https://rm-autodalys.lt/admin660go1drk/index.php?controller=AdminPdf&amp;submitAction=generateDeliverySlipPDF&amp;id_order_invoice=2801&amp;token=a03dcb56427295d1d060de6f2f414d65" target="_blank">##DE001152</a>
                                            </td>
                                            <td>
                                                --
                                            </td>
                                            <td class="text-right document_action">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel panel-bordered">
                <div class="panel-title">
                    Prekės ({{count($products)}})
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="orderProducts">
                            <thead>
                            <tr>
                                <th></th>
                                <th><span class="title_box ">Prekė</span></th>
                                <th>
                                    <span class="title_box ">Kaina už vienetą</span>
                                    <small class="text-muted">                          Su mokesčiais
                                    </small>
                                </th>
                                <th class="text-center"><span class="title_box ">Vnt.</span></th>
                                <th class="text-center"><span class="title_box ">Grąžinta</span></th>                                      <th class="text-center"><span class="title_box ">Gražinta prekių</span></th>
                                <th>
                                    <span class="title_box ">Viso</span>
                                    <small class="text-muted">                          Su mokesčiais
                                    </small>
                                </th>
                                <th style="display: none;" class="add_product_fields"></th>
                                <th style="display: none;" class="edit_product_fields"></th>
                                <th style="display: none;" class="standard_refund_fields">
                                    <i class="icon-minus-sign"></i>
                                    Prekių grąžinimai
                                </th>
                                <th style="display:none" class="partial_refund_fields">
                                    <span class="title_box ">Dalinis grąžinimas</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <div hidden>
                                {{$all = 0}}
                            </div>
                            @foreach($products as $product)
                                @if($product->product_id === null)
                                    <tr class="product-line-row">
                                        <td><img src="/storage/images/no_photo_500.jpg" width="55" height="55" alt="" class="imgm img-thumbnail"></td>
                                        <td>
                                            <a href="{{route('voyager.product.index')}}">
                                                <span class="productName">{{$product->name}}</span><br>
                                            </a>
                                            <div class="row-editing-warning" style="display:none;">
                                                <div class="alert alert-warning">
                                                    <strong>Paredagavus šią eilutę informacija apie bazinę kainą ir nuolaidą bus pašalinta.</strong>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="product_price_show">{{$product->priceTax()}}&nbsp;€</span>
                                        </td>
                                        <td class="productQuantity text-center">
                                            <span class="product_quantity_show">{{$product->amount}}</span>
                                            <span class="product_quantity_edit" style="display:none;">
		</span>
                                        </td>
                                        <td class="productQuantity text-center">
                                            <input type="hidden" value="1" class="partialRefundProductQuantity">
                                            <input type="hidden" value="79.23" class="partialRefundProductAmount">
                                        </td>
                                        <td class="productQuantity text-center">
                                            0
                                        </td>
                                        <td class="total_product">
                                            {{$product->priceTax() * $product->amount}}&nbsp;€
                                        </td>
                                    </tr>
                                    <input type="" hidden {{$all += $product->priceTax() * $product->amount}}>
                                @else
                                    <tr class="product-line-row">
                                        <td><img src="/storage/images/no_photo_500.jpg" width="55" height="55" alt="" class="imgm img-thumbnail"></td>
                                        <td>
                                            <a href="{{route('voyager.product.edit', $product->product->id)}}">
                                                <span class="productName">{{$product->product->name}}</span><br>
                                                Kodas: {{$product->product->reference}}<br>			Tiekėjo kodas: {{$product->product->supplier_reference}}		</a>
                                            <div class="row-editing-warning" style="display:none;">
                                                <div class="alert alert-warning">
                                                    <strong>Paredagavus šią eilutę informacija apie bazinę kainą ir nuolaidą bus pašalinta.</strong>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="product_price_show">{{$product->priceTax()}}&nbsp;€</span>
                                        </td>
                                        <td class="productQuantity text-center">
                                            <span class="product_quantity_show">{{$product->amount}}</span>
                                            <span class="product_quantity_edit" style="display:none;">
		</span>
                                        </td>
                                        <td class="productQuantity text-center">
                                            <input type="hidden" value="1" class="partialRefundProductQuantity">
                                            <input type="hidden" value="79.23" class="partialRefundProductAmount">
                                        </td>
                                        <td class="productQuantity text-center">
                                            0
                                        </td>
                                        <td class="total_product">
                                            {{$product->priceTax() * $product->amount}}&nbsp;€
                                        </td>
                                    </tr>
                                    <input type="" hidden {{$all += $product->priceTax() * $product->amount}}>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="alert alert-warning">
                                Šiai pirkėjų grupei kainos rodomos kaip: <strong>                          Su mokesčiais
                                </strong>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="panel panel-total">
                                <div class="table-responsive">
                                    <table class="table" style="margin-top: -2px">
                                        <tbody><tr id="total_products">
                                            <td class="text-right">Prekės:</td>
                                            <td class="amount text-right nowrap">
                                                {{$all}}&nbsp;€
                                            </td>
                                            <td class="partial_refund_fields current-edit" style="display:none;"></td>
                                        </tr>
                                        <tr id="total_discounts" style="display: none;">
                                            <td class="text-right">Nuolaidos</td>
                                            <td class="amount text-right nowrap">
                                                -0,00&nbsp;€
                                            </td>
                                            <td class="partial_refund_fields current-edit" style="display:none;"></td>
                                        </tr>
                                        <tr id="total_wrapping" style="display: none;">
                                            <td class="text-right">Įpakavimas</td>
                                            <td class="amount text-right nowrap">
                                                0,00&nbsp;€
                                            </td>
                                            <td class="partial_refund_fields current-edit" style="display:none;"></td>
                                        </tr>
                                        <tr id="total_shipping">
                                            <td class="text-right">Pristatymas</td>
                                            <td class="amount text-right nowrap">
                                                {{$order->delivery_price}}&nbsp;€
                                            </td>
                                            <td class="partial_refund_fields current-edit" style="display:none;">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        €
                                                    </div>
                                                    <input type="text" name="partialRefundShippingCost" value="0">
                                                </div>
                                                <p class="help-block"><i class="icon-warning-sign"></i> (Maks. 0,00&nbsp;€                           Su mokesčiais
                                                    )
                                                </p>
                                            </td>
                                        </tr>
                                        <tr id="total_order">
                                            <td class="text-right"><strong>Viso</strong></td>
                                            <td class="amount text-right nowrap">
                                                <strong>{{$order->total}}&nbsp;€</strong>
                                            </td>
                                            <td class="partial_refund_fields current-edit" style="display:none;"></td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($order->document_b1->name))
                        <div style="text-align: center;position: relative;flex: auto;">
                            <a target="_blank" href="{{'/'.$order->getFactura()}}" class="c-btn c-btn--red text-uppercase px-sm-5 mt-3" style="display: inline-block;
        padding: calc(0.5rem + 1px) 1rem;
        background: #ed3b3b;
        border: none;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        fill: #fff;
        cursor: pointer;" title="Žiūrėti fakturą">
                                <span>Žiūrėti fakturą</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-clipboard">

                        </i>Vartotojas</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="u-text-color-darker">
                            <a href="{{route('voyager.users.edit', $order->user->id)}}">
                                <h4>{{$order->user->address->company_name}}</h4>
                            </a>
                            @if(isset($order->user->name))
                            <h3>{{$order->user->name.' '.$order->user->surname}}</h3>
                                @endif
                        </div>
                        @if(isset($order->user->address->street))
                        <div class="u-text-color-darker">
                            Adresas: {{$order->user->address->street.' '.$order->user->address->building}}
                        </div>
                        @endif
                        @if(isset($order->user->address->city->name))
                        <div class="u-text-color-darker">
                            {{$order->user->address->post_code.' '.$order->user->address->city->name.', '.$order->user->address->country->name}}
                        </div>
                        @endif
                        @if(isset($order->user->address->phone))
                        <br>
                        <div class="u-text-color-darker">
                            Telefonas: {{$order->user->address->phone}}
                        </div>
                        @endif
                        <div class="u-text-color-darker">
                            E-mail: {{$order->user->email}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel panel panel-bordered panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-clipboard"></i> Informacija</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="u-text-color-darker">
                            <div style="font-size: 18px;">
                                <span style="font-weight: 500">Mokėjimas:</span> <span style="font-size: 15px;">{{$order->payment->name}}</span>
                            </div>

                            <div style="font-size: 18px;">
                                <span style="font-weight: 500">Pristatymas:</span> <span style="font-size: 15px;">{{$order->delivery->name}}</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
                @if(!empty($order->document_b1->name))
                <div class="panel panel panel-bordered panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon wb-clipboard"></i> Faktūra statusas</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="u-text-color-darker">
                                <div style="font-size: 18px;">
                                    <span style="font-weight: 500">Fakūra:</span> <span style="font-size: 15px;">{{$order->document_b1->name}}</span>
                                </div>
                                <form action="{{route('statusB1.update', $order->id)}}" method="post" class="form-horizontal well hidden-print">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <select id="b1_id" class="chosen form-control" name="b1_id">
                                                @foreach($docStatusB1 as $status)
                                                    <option value="{{$status->id}}" @if($order->document_b1->status_id === $status->id) selected="selected"@endif>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" name="submitState" id="submit_state" class="btn btn-primary">
                                                Atnaujinti būseną
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                @endif
        </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>

    </script>
@stop
