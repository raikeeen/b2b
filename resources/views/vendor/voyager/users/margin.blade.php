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
<div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="validationMessage">
                        <div>
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
                        </div>
                    </div>
                    <div class="panel-title" style="font-weight: bold">
                        Edit spec prices
                    </div>

                    <div class="panel-body">
                        <div class="row" style="padding: 15px 50px">

                            <table class="table table-bordered" style="width: 30%;float: left;">
                                <thead>
                                <tr>
                                    <th>Preke kodas</th>
                                    <th>Margin</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="newTableRow">
                                    <form action="{{route('voyager.users.addMargin',['id'=> $user->id])}}" method="post">
                                        @csrf
                                    <td>
                                        <div>
                                            <input type="text" name="product" class="form-control" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" value="0.00" name="margin" step="0.01" class="form-control">
                                    </td>
                                    <td >
                                        <button type="submit" class="btn btn-success add-row"><i class="voyager-check"></i></button>
                                    </td>
                                    </form>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="width: 30%;float: right;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="newTableRow">
                                    <form action="{{route('voyager.users.addCat',['id'=> $user->id])}}" method="post">
                                        @csrf
                                    <td>
                                        <div>
                                            <select name="category" class="form-control category">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select> <!---->
                                        </div>
                                    </td>
                                    <td>
                                        <input required type="number" value="0.00" name="margin" step="0.01" class="form-control">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success add-row"><i class="voyager-check"></i></button>
                                    </td>
                                    </form>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <div class="row" style="padding: 15px 50px">

                            <table class="table table-bordered" style="width: 30%;float: left;">
                                <thead>
                                <tr>
                                    <th>Preke kodas</th>
                                    <th>Margin</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($productMargin))
                                    @foreach($productMargin as $product)
                                <tr class="newTableRow">
                                        <form action="{{route('voyager.users.deleteMargin',['id'=> $user->id])}}" method="post">
                                            @csrf
                                            <td>
                                                <div>
                                                    <input type="text" name="product" class="form-control" value="{{$product->product->reference}}">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" value="{{$product->margin}}" name="margin" step="0.01" class="form-control">
                                            </td>
                                            <td >
                                                <button type="submit" class="btn btn-danger delete-row"><i class="voyager-trash"></i></button>
                                            </td>
                                        </form>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="width: 30%;float: right;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($catMargin))
                                    @foreach($catMargin as $cat)

                                <tr class="newTableRow">
                                    <form action="{{route('voyager.users.deleteCat',['id'=> $user->id])}}" method="post">
                                        @csrf
                                    <td>
                                        <div>
                                            <input type="text" value="{{$cat->category->name}}" name="cat" class="form-control">
                                            <input hidden type="text" value="{{$cat->category->id}}" name="category">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" value="{{$cat->margin}}" name="margin" step="0.01" class="form-control">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger delete-row"><i class="voyager-trash"></i></button>
                                    </td>
                                    </form>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="panel-footer">

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $('.category').select2();
    </script>
@stop
