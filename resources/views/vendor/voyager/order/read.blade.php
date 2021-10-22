@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.edit') }}</span>
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <i class="glyphicon glyphicon-list"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.return_to_list') }}</span>
        </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row" style="margin: 0">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <!-- form start -->
                    @foreach($dataType->readRows as $row)
                        @php
                        if ($dataTypeContent->{$row->field.'_read'}) {
                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                        }
                        @endphp
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">{{ $row->getTranslatedAttribute('display_name') }}</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            @if (isset($row->details->view))
                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read', 'view' => 'read', 'options' => $row->details])
                            @elseif($row->type == "image")
                                <img class="img-responsive"
                                     src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                            @elseif($row->type == 'multiple_images')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <img class="img-responsive"
                                             src="{{ filter_var($file, FILTER_VALIDATE_URL) ? $file : Voyager::image($file) }}">
                                    @endforeach
                                @else
                                    <img class="img-responsive"
                                         src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                                @endif
                            @elseif($row->type == 'relationship')
                                 @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $row->details])
                            @elseif($row->type == 'select_dropdown' && property_exists($row->details, 'options') &&
                                    !empty($row->details->options->{$dataTypeContent->{$row->field}})
                            )
                                <?php echo $row->details->options->{$dataTypeContent->{$row->field}};?>
                            @elseif($row->type == 'select_multiple')
                                @if(property_exists($row->details, 'relationship'))

                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                        {{ $item->{$row->field}  }}
                                    @endforeach

                                @elseif(property_exists($row->details, 'options'))
                                    @if (!empty(json_decode($dataTypeContent->{$row->field})))
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                            @if (@$row->details->options->{$item})
                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ __('voyager::generic.none') }}
                                    @endif
                                @endif
                            @elseif($row->type == 'date' || $row->type == 'timestamp')
                                @if ( property_exists($row->details, 'format') && !is_null($dataTypeContent->{$row->field}) )
                                    {{ \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) }}
                                @else
                                    {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'checkbox')
                                @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                    @if($dataTypeContent->{$row->field})
                                    <span class="label label-info">{{ $row->details->on }}</span>
                                    @else
                                    <span class="label label-primary">{{ $row->details->off }}</span>
                                    @endif
                                @else
                                {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'color')
                                <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                            @elseif($row->type == 'coordinates')
                                @include('voyager::partials.coordinates')
                            @elseif($row->type == 'rich_text_box')
                                @include('voyager::multilingual.input-hidden-bread-read')
                                {!! $dataTypeContent->{$row->field} !!}
                            @elseif($row->type == 'file')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                            {{ $file->original_name ?: '' }}
                                        </a>
                                        <br/>
                                    @endforeach
                                @else
                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">
                                        {{ __('voyager::generic.download') }}
                                    </a>
                                @endif
                            @else
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{{ $dataTypeContent->{$row->field} }}</p>
                            @endif
                        </div><!-- panel-body -->
                        @if(!$loop->last)
                            <hr style="margin:0;">
                        @endif
                    @endforeach

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
                    <div style="text-align: center;position: relative;flex: auto;">
                        <a href="{{$order->invoice}}" class="c-btn c-btn--red text-uppercase px-sm-5 mt-3" style="display: inline-block;
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
                </div>
            </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon wb-clipboard">

                            </i> Vartotojas {{$order->user->address->company_name}}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                                <div class="u-text-color-darker">
                                    <a href="{{route('voyager.users.show', $order->user->id)}}">
                                    <h4>{{$order->user->name.' '.$order->user->surname}}</h4>
                                    </a>
                                </div>
                                <div class="u-text-color-darker">
                                    Adresas: {{$order->user->address->street.' '.$order->user->address->building}}
                                </div>
                                <div class="u-text-color-darker">
                                    {{$order->user->address->post_code.' '.$order->user->address->city->name}}
                                </div>
                            <br>
                                <div class="u-text-color-darker">
                                    Telefonas: {{$order->user->address->phone}}
                                </div>
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
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
