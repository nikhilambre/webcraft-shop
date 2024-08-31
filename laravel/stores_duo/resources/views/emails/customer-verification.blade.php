@component('mail::message')
# WelCome to StoresBuzz

Hello {{ $user->name }}, 

Click on the below button to verify your email address.

@component('mail::button', ['url' => '{{ env('APP_URL') }}/customer/register/verify/'.$user->email_token])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
