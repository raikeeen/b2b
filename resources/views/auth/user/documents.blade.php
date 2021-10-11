@extends('welcome')

@section('title','documents')
@section('content')
    {{ Breadcrumbs::render('documents') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">Dokumentai</h1>
    <div class="row mt-3 mb-5">
        <div class="col-12 col-md-4 col-lg-3">
            <select class="c-select w-100">
                <option value="CURRENT_DAY">Šiandien</option>
                <option value="CURRENT_MONTH" selected="">Šis mėnuo</option>
                <option value="LAST_MONTH">Ankstesnis mėnuo</option>
                <option value="CURRENT_YEAR">Šie metai</option>
                <option value="LAST_YEAR">Ankstesni metai</option>
                <option value="CUSTOM">Nestandartinis diapazonas</option>
            </select>
        </div>
        <!-- ko if: viewDate() === 'CUSTOM' --><!-- /ko -->
    </div>
    @if(isset($orders))
    <div class="text-center my-5 py-5">
        <span class="c-headline mb-2">
          <span>Nieko nerasta.</span>
        </span>
        <span class="c-headline c-headline--sm">
          <span>Nėra dokumentų iš laikotarpio nuo</span>
          <span data-bind="text: currentFrom().format('D MMMM YYYY')">1 rugsėjo 2021</span>
          <span>į</span>
          <span data-bind="text: currentTo().format('D MMMM YYYY')">30 rugsėjo 2021</span>.
        </span>
    </div>
    @else
    @endif
@endsection
