@component('mail::message')
    # Prieiga prie B2B sistemos

    El. paštas: {{ $details['email'] }}
    Numeris: {{ $details['phone'] }}
    Laiška: {{ isset($details['message']) }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
