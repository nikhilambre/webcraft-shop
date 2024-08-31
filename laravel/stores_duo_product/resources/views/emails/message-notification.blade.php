@component('mail::message')
# Hello, You Have a New Message in Your Inbox

This is Notification for New Message you received, You can visit Dashboard for Updating Inbox Messages.
<br><br>

Visitor's Name: {{ $message->messageName }}<br>
Visitor's Email: {{ $message->messageEmail }}<br>
Visitor's Contact No.: {{ $message->messageContact }}<br><hr>
Visitor's Message: {{ $message->messageText }}<br><br><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
