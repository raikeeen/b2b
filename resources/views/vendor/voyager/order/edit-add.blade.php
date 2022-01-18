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
                                <div class="row">
                                    <div class="float-left padding-left">Prekės ({{count($products)}})</div>


                                </div>
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
                                            <th class="partial_refund_fields">
                                                <span class="title_box ">Ištriniti</span>
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
                                        @if(isset($products))
                                        @foreach($products as $product)
                                            <form action="{{route('order.item.update', ['id' => $order->id])}}" method="post">
                                                @csrf
                                                <button style="display: none" hidden type="submit" class="btn btn-success add-row"><i hidden class="voyager-check"></i></button>
                                                <input step="any" hidden type="number" name="id_item" value="{{$product->id}}">
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
                                                        <span class="product_price_show">

                                                            <input step="any" required class="input-none" type="number" name="price" value="{{$product->priceTax()}}">&nbsp;€
                                                        </span>
                                                    </td>
                                                    <td class="productQuantity text-center">
                                                        <span class="product_quantity_show">
                                                            <input step="any" required class="input-none" type="number" name="amount" value="{{$product->amount}}">
                                                        </span>
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
                                                    <td class="total_product1">
                                                        <div class="form-delete">
                                                            <input id="delete_item" hidden type="text" name="item" value="{{$product->id}}">
                                                            <div type="submit" class="btn btn-danger delete-row"><i class="voyager-trash"></i></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <input step="any" type="" hidden {{$all += $product->priceTax() * $product->amount}}>
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
                                                        <span class="product_price_show">
                                                            <input step="any" required class="input-none" type="number" name="price" value="{{$product->priceTax()}}">&nbsp;€
                                                        </span>
                                                    </td>
                                                    <td class="productQuantity text-center">
                                                        <span class="product_quantity_show">
                                                            <input step="any" required class="input-none" type="number" name="amount" value="{{$product->amount}}">
                                                        </span>
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
                                                    <td class="total_product1">
                                                        <div class="form-delete">
                                                            <input id="delete_item" hidden type="text" name="item" value="{{$product->id}}">
                                                            <div type="submit" class="btn btn-danger delete-row"><i class="voyager-trash"></i></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <input step="any" type="" hidden {{$all += $product->priceTax() * $product->amount}}>
                                            @endif
                                            </form>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>


                                    <form class="float-right" action="{{route('order.item.add', ['id' => $order])}}" method="post">
                                        @csrf
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td style="padding-right:15px">
                                                    <input type="text" value="" name="reference" step="0.01" class="form-control" placeholder="reference">
                                                </td>
                                                <td style="padding-right:15px">
                                                    <input type="number" value="" name="amount" step="1" class="form-control" placeholder="amount">
                                                </td>
                                                <td style="padding-right:15px">
                                                    <input type="number" value="" name="price" step="0.01" class="form-control" placeholder="price">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success add-row float-right"><i class="voyager-check"></i></button>
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>


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
                                                <form class="info" action="{{route('order.info.update', ['id' => $order->id])}}" method="post">
                                                    <button style="display: none" hidden type="submit" class="btn btn-success add-row"><i hidden class="voyager-check"></i></button>
                                                    {{csrf_field()}}
                                                <table class="table" style="margin-top: -2px">
                                                    <tbody><tr id="total_products">
                                                        <td class="text-right">Prekės:</td>
                                                        <td class="amount text-right nowrap">
                                                            <input disabled step="any" class="input-none" type="number" name="product_all" value="{{$all}}">&nbsp;€
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
                                                            <input step="any" required class="input-none" type="number" name="delivery" value="{{$order->delivery_price}}">&nbsp;€
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
                                                    <tr id="total_shipping">
                                                        <td class="text-right">Apmokėjimas</td>
                                                        <td class="amount text-right nowrap">
                                                            <input step="any" required class="input-none" type="number" name="payment" value="{{$order->payment_price}}">&nbsp;€
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
                                                            <strong>
                                                                <input step="any" required class="input-none" type="number" name="total" value="{{$order->total}}">&nbsp;€
                                                            </strong>
                                                        </td>
                                                        <td class="partial_refund_fields current-edit" style="display:none;"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </form>
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
                @if(isset($order))
                    @if($order->delivery_id == 2)
                        <div class="panel panel-bordered">
                            <div class="panel-title" style="font-weight: bold">
                                Venipak Kurjeris
                            </div>
                            <div class="panel-body">
                                <form action="{{route('venipak.push', $order->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group product-form">
                                        <div class="col-4">
                                            <label class="control-label" for="name">Pakuočių skaičius (vnt):</label>
                                            <input required="" type="number" class="form-control" id="vnt" name="vnt" placeholder="vnt" value="1">
                                        </div>
                                        <div class="col-6">
                                                <label class="control-label" for="name">COD:</label>
                                                <input type="checkbox" name="is_cod" id="is_cod" style="padding-right: 30px">
                                            <label class="control-label" for="name">Global?:</label>
                                            <input type="checkbox" name="is_global" id="is_global">
                                            <label class="control-label" for="name">Call?:</label>
                                            <input type="checkbox" name="call" id="call">
                                        </div>
                                    </div>
                                    <div class="form-group product-form">
                                        <div class="col-4">
                                            <label class="control-label" for="name">Svoris (Kg):</label>
                                            <input required="" type="number" class="form-control" id="weight" name="weight" step="0.01" placeholder="kg" value="1.00">
                                        </div>
                                    </div>
                                    <div class="form-group product-form">
                                        <div id="cod_show" hidden>
                                            <label class="control-label" for="name">C.O.D suma:</label>
                                            <input required="" type="number" class="form-control" id="suma_cod" name="suma_cod" step="0.01" placeholder="suma" value="0.00">
                                        </div>
                                    </div>
                                    <div class="form-group product-form">
                                        <div class="row" id="global-show" hidden>
                                            <div class="col-4" style="padding-left: 15px; max-width: 185px">
                                                <select name="cod" id="cod" style="max-width: 185px">
                                                    <option value="global" selected>Global – use global delivery with cheapest price</option>
                                                    <option value="express">Express – TNT express service</option>
                                                    <option value="economy_express">Economy_express – TNT economy express service</option>
                                                    <option value="economy2">Economy2 – GLS service </option>
                                                </select>
                                            </div>
                                            <div class="col-4" style="padding-left: 15px; max-width: 220px">
                                                <label class="control-label" for="name">Global order suma:</label>
                                                <input required="" type="number" class="form-control" id="global_sum" name="global_sum" step="0.01" placeholder="suma" value="{{$order->total ?? 0}}">
                                            </div>
                                        </div>
                                    </div>

                                    <button @if(isset($order->venipak->send) && $order->venipak->send === 1) disabled="disabled" @endif type="submit" name="submitState" id="submit_state" class="btn btn-primary">
                                        1. Išsaugoti
                                    </button>
                                </form>

                                <form method="POST" action="{{route('venipak.getLabel', $order->id)}}" id="venipakOrderPrintLabelsForm" target="_blank">
                                    {{csrf_field()}}
                                    <button type="submit" name="venipak_printlabel" id="venipakOrderPrintLabels" disabled="disabled" class="btn btn-success">2. Spausdinti lipduką</button>
                                </form>

                                <form method="POST" action="{{route('venipak.getManifest', $order->id)}}" id="venipakOrderPrintLabelsForm" target="_blank">
                                    {{csrf_field()}}
                                    <button type="submit" name="venipak_printman" id="venipakOrderPrintManifest" disabled="disabled" class="btn btn-success">3. Spausdinti manifestą</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endif
        </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $('#cod').select2({ width: 'resolve' });
        $('#is_cod').click(function() {

            if($(this).prop("checked") === true) {
                $( "#cod_show" ).show();
            } else if($(this).prop("checked") === false){
                $( "#cod_show" ).hide();
            }

        })
        $('#is_global').click(function() {

            if($(this).prop("checked") === true) {
                $( "#global-show" ).show();
            } else if($(this).prop("checked") === false){
                $( "#global-show" ).hide();
            }

        })
        @if(isset($order->venipak->send) && $order->venipak->send === 1)
        $('#venipakOrderPrintManifest').prop('disabled', false);
        $('#venipakOrderPrintLabels').prop('disabled', false);
        @endif
        /*$(document).ready(() => {
            $('.info').on('submit', () => {
                return false;
            });
        });
        $('.info').keypress((e) => {
            if (e.which === 13) {
                $('.info').submit();
            }
        })*/
        $('.form-delete').on('click', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log($('#delete_item').val())
            var formData = {
                item: $('#delete_item').val(),
            };
            var type = "POST";
            var ajaxurl = '{{route('order.item.delete', ['id' => $order->id])}}';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    location.reload();

                },
                error: function (data) {
                    console.log(data);
                }
            });
        })

    </script>
@stop
