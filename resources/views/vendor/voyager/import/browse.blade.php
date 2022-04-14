@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' ')

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
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="icon voyager-archive"></i> Importas
        </h1>
    </div>
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div style="padding-left: 15px;">
                                <h3>Pridėti failą</h3>
                                <div class="row">
                                    <div style="padding-bottom: 15px; padding-top: 5px">
                                        <input type="file" id="import" name="import">
                                    </div>
                                    <button class="btn btn-sm btn-primary" type="submit">Importuoti</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
