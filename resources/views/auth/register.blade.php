@extends('welcome')
@section('title','Registracijos forma')
@section('content')
    <div class="container pb-5">

        {{ Breadcrumbs::render('register') }}

        <div class="row">
            <div class="col-12">


                <div id="hook_hookregister" class="" data-asp-hook="77" data-asp-hook-name="HookRegister">
                    <!-- Formularz rejestracji -->

                    <div data-control-hook-id="116" data-control-id="69" data-control-order="0" data-control-name="Formularz rejestracji" data-control-type="EmailForm">

                        <form class="c-contact-form clearfix" action="{{route('emails.register')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-info" role="alert">
                                                <div class="mb-2"><span>Kad tapti RM Automotive klientu prašome užpildyti registracijos formą. Po registracijos užklausos gavimo susisieksime su Jumis dėl prisijungimo prie B2B. </span></div>
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <div class="c-form-group">
                                                <label for="f-100">
                                                    El. paštas

                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input placeholder="El. paštas" class="form-control c-input" data-field-id="ReplyToEmail" data-val="true" data-val-required="Laukas yra būtinas." id="f-100" name="replyEmail" required="" type="text" value="">
                                                <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
                                            </div>

                                        </div>
                                        <div class="col-12">

                                            <div class="c-form-group">
                                                <label for="f-101">
                                                    Telefonas

                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input placeholder="Telefonas" class="form-control c-input" data-field-id="Phone" data-val="true" data-val-required="Laukas yra būtinas." id="f-101" name="phone" required="" type="text" value="">
                                                <span class="d-block validationMessage" data-valmsg-for="f-101" data-valmsg-replace="true"></span>
                                            </div>

                                        </div>
                                        <div class="col-12">

                                            <div class="c-form-group">
                                                <label for="f-102">
                                                    Žinutė

                                                </label>
                                                <textarea placeholder="Žinutė" class="form-control c-input" data-field-id="Message" data-val="true" id="f-102" name="message"></textarea>
                                                <span class="d-block validationMessage" data-valmsg-for="f-102" data-valmsg-replace="true"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div data-bind="if: errorString() !== undefined, attr: { hidden: false }"></div>
                            <button class="c-btn c-btn--primary" type="submit" data-loading="Siunčiama žinutė..." data-bind="css: { 'c-btn--loading': submitted() }">
    <span>
      <span>Siųsti žinutę</span>
    </span>
                            </button>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-6 mt-4">

            </div>
        </div>
    </div>
@endsection
