@component('mail::message')
# Welcome to {{ config('app.name') }} Dashboard

Your Dashboard profile is created for {{ config('app.name') }}. Use following creadentials to login. We also suggest you to change your password after first login.
<br><br>
Username: {{ $user->username }}<br>
Password: {{ $user->code }}<br>

@component('mail::button', ['url' => env('APP_DASHBOARD_URL') ])
Visit Dashboard Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
