@component('mail::message')
# Welcome {{ $notifiable->name }}

Welcome to {{ config('app.name') }}, before you start using your account, you need to activate it
    ¯\\_(ツ)_/¯

@component('mail::button', ['url' => $url])
Activate Account
@endcomponent

If you did not create an account, no further action is required.
Thanks,

{{ config('app.name') }} Team

@component('mail::subcopy')
If you,re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }} 
@endcomponent

@endcomponent