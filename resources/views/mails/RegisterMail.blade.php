@component('mail::message')
# Prieiga prie B2B sistemos

El. paštas: {{ $details['email'] }}
Numeris: {{ $details['phone'] }}
Laiška: @if(isset($details['message'])) {{$details['message']}} @endif



Thanks,
{{ config('app.name') }}
@endcomponent
