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
    <form role="form"
          class="form-edit-add"
          action="{{route('voyager.users.createNew')}}"
          method="POST" enctype="multipart/form-data">

    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-bordered">
                    <div class="panel-title" style="font-weight: bold">
                        Vartotojas
                    </div>

                    <!-- form start -->

                        <!-- PUT Method if we are editing -->
                    @if($edit)
                    <input type="text" name="put" value="put" hidden>
                        <input type="text" name="user_id" value="{{$user->id}}" hidden>
                    @endif
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <div class="form-group  col-md-12 ">
                                    <label class="control-label" for="name">Vardas:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Vardas" value="{{$user->name ?? ''}}">
                                </div>
                                <div class="form-group  col-md-12 ">
                                    <label class="control-label" for="name">Pavardė:</label>
                                    <input type="text" class="form-control" name="surname" placeholder="Pavardė" value="{{$user->surname ?? ''}}">
                                </div>
                                <div class="form-group  col-md-12 ">
                                    <label class="control-label" for="name">el. Paštas<span class="star-red">*</span>:</label>
                                    <input required="" type="text" class="form-control" name="email" placeholder="Paštas" value="{{$user->email ?? ''}}">
                                </div>
                                <div class="form-group  col-md-12 ">
                                    <label class="control-label" for="name">Slaptažodis:@if(!$edit) <span class="star-red">*</span>: @endif</label>
                                    <input @if(empty($user))required=""@endif type="text" class="form-control" name="password" placeholder="Slaptažodis" value="">
                                </div>

                                <div class="form-group  col-md-12 ">
                                    <div class="row" style="padding-left: 15px">
                                        <label class="control-label" for="name">User role<span class="star-red">*</span>:</label>
                                    </div>
                                    <select class="form-control" name="role" id="role">

                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($role->id == ($user->role_id ?? 2)) selected="selected"@endif">{{$role->display_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-bordered">
                    <div class="panel-title" style="font-weight: bold">
                        Įmonė:
                    </div>
                    <div class="panel-body">
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Įmonė<span class="star-red">*</span>:</label>
                            <input required="" type="text" class="form-control" name="company_name" placeholder="Įmonė" value="{{$user->address->company_name ?? ''}}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">Įmonės kodas:</label>
                            <input type="text" class="form-control" name="vat" placeholder="Įmonės kodas" value="{{$user->address->vat ?? ''}}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <label class="control-label" for="name">PVM kodas:</label>
                            <input type="text" class="form-control" name="pvm" placeholder="PVM kodas" value="{{$user->address->pvm ?? ''}}">
                        </div>
                        <div class="form-group  col-md-12 ">
                            <div class="col-md-6" style="padding-left: 0px">
                            <label class="control-label" for="name">Šalis<span class="star-red">*</span>:</label>
                            <select class="form-control" name="country" id="country">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" @if(($user->address->country_id ?? 1) == $country->id) selected="selected" @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6" style="padding-right: 0px">
                            <label class="control-label" for="name">Miestas<span class="star-red">*</span>:</label>
                            <select class="form-control" name="city" id="city">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" @if(($user->address->city_id ?? 1) == $city->id) selected="selected" @endif>{{$city->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group  col-md-12 ">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label" for="name">Gatvė:</label>
                                    <input type="text" class="form-control" name="street" placeholder="Gatvė" value="{{$user->address->street ?? ''}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label" for="name">Namas:</label>
                                    <input type="text" class="form-control" name="building" placeholder="№" value="{{$user->address->building ?? ''}}">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label" for="name">Būtas</label>
                                    <input type="text" class="form-control" name="apartment" placeholder="№" value="{{$user->address->apartment ?? ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group  col-md-6 ">
                            <label class="control-label" for="name">Pašto kodas:</label>
                            <input type="text" class="form-control" name="post_code" placeholder="Pašto kodas" value="{{$user->address->post_code ?? ''}}">
                        </div>
                        <div class="form-group  col-md-6 ">
                            <label class="control-label" for="name">Telefono numeris:</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Telefono numeris" value="{{$user->address->phone ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="panel-title" style="font-weight: bold;">
                        Nuolaida<span class="star-red">*</span>:
                    </div>
                    <div class="panel-body"style="margin: 0 30px;">
                        <div class="form-group" >
                            <div class="row">
                            <input required="" type="number" class="form-control" name="discount" placeholder="Nuolaida" value="{{$user->discount ?? 0}}">
                            <a style="    position: absolute;
    right: 5px;
    bottom: 20px;
    padding: 4px 25px;" class="c-btn">%</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $('#city').select2();
        $('#country').select2();
        $('#role').select2();
    </script>
@stop
