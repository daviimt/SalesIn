@component('mail::message')
# Welcome {{ $notifiable->name }}

Para usar tu cuenta es necesario que actives tu cuenta.

@component('mail::button', ['url' => $url])
Activar Cuenta
@endcomponent

If you did not create an account, no further action is required.
Thanks,

{{ config('app.name') }} Team

@component('mail::subcopy')
If you,re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }} 
@endcomponent

@endcomponent