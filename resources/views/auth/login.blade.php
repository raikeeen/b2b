@extends('welcome')

@section('title','Prisijungimas')
@section('content')

    {{ Breadcrumbs::render('login') }}
    <div class="row">
        <div class="col-12 col-md-6">
            <h1 class="header-sign">
                <span>Prisijunkite</span>
            </h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">
                        {{ __('Vartotojo vardas') }}
                        <span class="text-danger">*</span>
                    </label>

                    <input id="email" type="email" placeholder="Vartotojo vardas" class="form-control input main-search @error('email') is-invalid @enderror" data-val-required="Laukas yra būtinas." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        {{ __('Slaptažodis') }}
                        <span class="text-danger">*</span>
                    </label>

                    <input placeholder="Slaptažodis" class="form-control input main-search  @error('password') is-invalid @enderror" data-val-required="Laukas yra būtinas." id="password" type="password" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="custom-control custom-checkbox my-2">
                    <div class="form-group row">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Prisimink mane') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>




                <button type="submit" class="form-btn" data-loading="Prašome palaukti ...">
                    {{ __('Prisijunkite') }}
                </button>
            </form>

            <div class="mt-4 text-muted">
                <div>
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Pamiršau slaptažodį') }}
                        </a>
                    @endif
                </div>
                <div class="mt-1">
                    <span>Jūsų el. Pašto adresas dar nepatvirtintas?</span>
                    <a href="https://www.rm-autodalys.eu/wyslij-email-aktywacyjny" title="Patvirtinti el. paštą">
                        <span>Patvirtinti el. paštą</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="alert alert-info">
                <div style="margin-bottom: .5rem !important;">
                    <span>Prieiga prie B2B sistemos galima tik registruotiems klientams. Kad tapti klientu paspausk nuorodą žemiau.</span>
                </div>
                <a class="font-weight-bold" href="/register">
                    <span>Registracijos forma</span>
                </a>
            </div>
        </div>
    </div>
@endsection
