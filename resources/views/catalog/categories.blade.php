@extends('welcome')

@section('title','Catalogas')
@section('content')
    {{ Breadcrumbs::render('catalog') }}
    <div class="my-2">
        <h1 class="c-headline my-4">Katalogas</h1>
    </div>

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
