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
        {{ __(($edit ? 'edit' : 'Istorija')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
        @if($edit)
            <a href="{{route('voyager.users.history'), $user->id}}" style="padding-left: 30px; color: #1f6fb2"> Paieškos istorija</a>
        @endif
    </h1>
    @include('voyager::multilingual.language-selector')

@stop

@section('content')
    <form role="form"
          class="form-edit-add"
          action="{{route('voyager.users.createNew')}}"
          method="POST" enctype="multipart/form-data">

        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-title" style="font-weight: bold">
                            Paieškos istorija
                        </div>

                        <div class="panel-body">
                            @if(isset($story))
                                {{ $story->render("vendor.pagination.default") }}
                                <div>
                                    <div class="row d-none d-md-flex-voy pb-2-voy font-weight-bold-voy" style="margin-right: 0;margin-left: 0; font-weight: bold; color: #37474f; font-size: 16px">
                                        <div class="col-voy">
                                            <a href="{{route('voyager.users.history', ['id' => $user->id, $sort[2] => 'id'])}}">Id</a>
                                            @if($sort[0] == 'asc' && $sort[1] == 'id')
                                                <i class="voyager-angle-up"></i>
                                            @elseif($sort[0] == 'desc' && $sort[1] == 'id')
                                                <i class="voyager-angle-down"></i>
                                            @endif
                                        </div>
                                        <div class="col-voy">
                                            <a href="{{route('voyager.users.history', ['id' => $user->id, $sort[2] => 'search'])}}">Paeška</a>
                                            @if($sort[0] == 'asc' && $sort[1] == 'search')
                                            <i class="voyager-angle-up"></i>
                                            @elseif($sort[0] == 'desc' && $sort[1] == 'search')
                                                <i class="voyager-angle-down"></i>
                                            @endif
                                        </div>
                                        <div class="col-voy">
                                            <a href="{{route('voyager.users.history', ['id' => $user->id, $sort[2] => 'created_at'])}}">Data</a>
                                            @if($sort[0] == 'asc' && $sort[1] == 'created_at')
                                                <i class="voyager-angle-up"></i>
                                            @elseif($sort[0] == 'desc' && $sort[1] == 'created_at')
                                                <i class="voyager-angle-down"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- ko foreach: orders() -->
                                    @foreach($story as $st)
                                        <hr class="m-0-voy hr-voy">
                                        <div class="row py-2-voy" style="padding-top: 10px">
                                            <div class="col-md-4">

                                                <span data-bind="text: id">{{$st->id}}</span>

                                            </div>
                                            <div class="col-md-4" style="padding-left: 0;padding-right: 0;">


                                                <span data-bind="text: date.format('D MMMM YYYY, HH:mm')">{{$st->search}}</span>

                                            </div>
                                            <div class="col-md-4" style="padding-left: 0">


                                                <span data-bind="text: status.name || ''">{{$st->created_at}}</span>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        </div><!-- panel-body -->

                        <div class="panel-footer">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Delete File Modal -->
@stop

@section('javascript')

@stop
