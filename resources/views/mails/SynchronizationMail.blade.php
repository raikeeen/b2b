@component('mail::message')
    # Introduction

    <h3>{{ $details['name'] }}</h3>
    @if(isset($details['time']))
    <h3>{{ $details['time'] }}</h3>
    @endif
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
