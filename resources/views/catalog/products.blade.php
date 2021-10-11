@extends('welcome')

@section('title','Prekės')
@section('content')
    {{ Breadcrumbs::render('products') }}
 <products></products>
@endsection
