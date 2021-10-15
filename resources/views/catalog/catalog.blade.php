@extends('welcome')

@section('title','Catalogas')
@section('content')
    {{ Breadcrumbs::render('catalog') }}
    <div class="my-2">
        <h1 class="c-headline my-4">Katalogas</h1>
    </div>
{{--    <form action="{{route('catalog.store')}}" method="post">
    @csrf
    <input name="name" id="name" type="text">


        <select id="parent" name="parent" id="">
            <option value="none">no any op</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">
                {{$category->name}}
            </option>
            @endforeach
        </select>
        <button>add</button>
    </form>--}}

    @foreach($categories as $category)

    <div class="c-category c-category--width">
        <a href="https://www.rm-autodalys.eu/katalog?nodeId=AMO0&amp;segment1=amortizavimo-sistema" title="AMORTIZAVIMO SISTEMA">
            <div class="c-panel">
                <div class="c-category__hover p-3">
                    <span class="c-category__title">{{strtoupper($category->name)}}</span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="c-category c-category--width">
        <a href="https://www.rm-autodalys.eu/katalog?nodeId=AMO0&amp;segment1=amortizavimo-sistema" title="AMORTIZAVIMO SISTEMA">
            <div class="c-panel">
                <div class="c-category__hover p-3">
                    <span class="c-category__title">AMORTIZAVIMO SISTEMA</span>
                </div>
            </div>
        </a>
    </div>
@endsection
