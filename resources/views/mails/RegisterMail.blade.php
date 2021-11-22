@component('mail::message')
    # Introduction

    <h3>email: {{ $details['email'] }}</h3>
    <h3>phone: {{ $details['phone'] }}</h3>
    <h3>message: {{ isset($details['message']) }}</h3>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
