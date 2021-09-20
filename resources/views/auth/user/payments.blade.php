@extends('welcome')

@section('title','Company')
@section('content')
    <h1 class="c-headline c-headline--semi-light u-bd-secondary pl-2 py-1">Mokėjimai</h1>
    <div data-bind="if: paymentsLoaded(), attr: { hidden: false }">
        <div class="c-panel--no-shadow py-2 px-3">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <span class="c-headline c-headline--sm mb-1"><span>Reikia mokėti</span></span>
                    <div class="font-weight-bold" data-bind="
              text: totalPayments(),
              css: {
                'text-muted': parseFloat(totalPayments()) === 0,
                'text-danger': parseFloat(totalPayments()) >= 0
              }"></div>
                </div>
                <!-- ko foreach: overdues -->
                <div class="col-12 col-md-6 col-lg-3">
          <span class="c-headline c-headline--sm mb-1">
            <span>Pavėluotas</span>
            <span data-bind="if: overdueDays != 1"></span>
          </span>
                    <div class="font-weight-bold text-muted text-danger" data-bind="
              text: value,
              css: {
                'text-muted': parseFloat(value) === 0,
                'text-danger': parseFloat(value) >= 0
              }">0 EUR</div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
          <span class="c-headline c-headline--sm mb-1">
            <span>Pavėluotas</span>
            <span data-bind="if: overdueDays != 1">
              <span>daugiau nei</span>
              <span data-bind="text: overdueDays">7</span>
              <span>dienų</span>
            </span>
          </span>
                    <div class="font-weight-bold text-muted text-danger" data-bind="
              text: value,
              css: {
                'text-muted': parseFloat(value) === 0,
                'text-danger': parseFloat(value) >= 0
              }">0 EUR</div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
          <span class="c-headline c-headline--sm mb-1">
            <span>Pavėluotas</span>
            <span data-bind="if: overdueDays != 1">
              <span>daugiau nei</span>
              <span data-bind="text: overdueDays">30</span>
              <span>dienų</span>
            </span>
          </span>
                    <div class="font-weight-bold text-muted text-danger" data-bind="
              text: value,
              css: {
                'text-muted': parseFloat(value) === 0,
                'text-danger': parseFloat(value) >= 0
              }">0 EUR</div>
                </div>
                <!-- /ko -->
            </div>
        </div>


        <div class="my-4">
            <h2 class="c-headline c-headline--sm"><span>Įsipareigojimai</span></h2>
            <div class="row d-none d-md-flex pb-2 font-weight-bold">
                <div class="col">
                    <span>Dokumentas</span>
                </div>
                <div class="col">
                    <span>Pateikimo data</span>
                </div>
                <div class="col">
                    <span>Apmokėjimo terminas</span>
                </div>
                <div class="col text-right">
                    <span>Dokumento vertė</span>
                </div>
                <div class="col text-right">
                    <span>Apmokėtas</span>
                </div>
                <div class="col text-right">
                    <span>Reikia mokėti</span>
                </div>
            </div>
            <!-- ko foreach: paymentDocuments().filter(function (x) { return x.type === '+' }) --><!-- /ko -->
        </div>

        <div data-bind="if: paymentDocuments().filter(function (x) { return x.type === '-' }).length, attr: { hidden: false }"></div>
    </div>
@endsection
