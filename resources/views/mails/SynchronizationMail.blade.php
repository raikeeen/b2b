@component('mail::message')
    # Introduction

    <h3>{{ $details['name'] }}</h3>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
