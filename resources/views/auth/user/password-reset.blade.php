@extends('welcome')

@section('title','Slaptažodžio keitimas')
@section('content')
    {{ Breadcrumbs::render('password-reset') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary py-1">Slaptažodžio keitimas</h1>
    <div class="col-12 col-md-6">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="c-form-group">
                <label for="f-100">
                    Slaptažodzio pakeitimui išsiųsime nuorodą el.paštu

                    <span class="text-danger">*</span>
                </label>
                <input placeholder="email" id="email" type="email" class="c-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
            </div>

            <button data-bind="css: { 'c-btn--loading': submitted() }" type="submit" class="c-btn c-btn--primary mt-3" data-loading="Prašome palaukti ...">
                <span> {{ __('Siųsti nuorodą') }} </span>
            </button>
        </form>
    </div>





        {{--<div class="col-12 col-md-6">
            <form data-bind="submit: submit" action="https://www.rm-autodalys.eu/api/stock-change-password-form-field" method="post">
                <div data-bind="if: errorString(), attr: { hidden: false }"></div>


                <div class="c-form-group">
                    <label for="f-100">
                        Dabartinis slaptažodis

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="Dabartinis slaptažodis" class="form-control c-input" data-field-id="OldPassword" data-val="true" data-val-required="Laukas yra būtinas." id="f-100" name="OldPassword" required="" type="password" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-101">
                        Naujas slaptažodis

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="Naujas slaptažodis" class="form-control c-input" data-field-id="NewPassword" data-val="true" data-val-required="Laukas yra būtinas." id="f-101" name="NewPassword" required="" type="password" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-101" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-102">
                        Patvirtinkite slaptažodį

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="Patvirtinkite slaptažodį" class="form-control c-input" data-field-id="NewPasswordConfirmation" data-val="true" data-val-required="Laukas yra būtinas." id="f-102" name="NewPasswordConfirmation" required="" type="password" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-102" data-valmsg-replace="true"></span>
                </div>
                <button data-bind="css: { 'c-btn--loading': submitted() }" type="submit" class="c-btn c-btn--primary mt-3" data-loading="Prašome palaukti ...">
                    <span>Pakeisti slaptažodį</span>
                </button>
                <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FgVZIDTQbtHvQ4qq4bq8ihfngU_JkmPWdo0Xh4jpzp4CEnbGy4FdUufsIuGD1628agseYoVgIC6Ydlxy0d7EXVCoSt7d7Np7ntQ5Up7JhOhExXad4W_e70Z3Ni1V5lmgbpvUz9zzElzBYvfUvgWdnoFFMYFCiaO5NTvCnalFVFeb7QnWPN8jPELNtPGmjoa3w"></form>
        </div>--}}
    </div>
@endsection
