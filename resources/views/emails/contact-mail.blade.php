<x-mail::message>
# Contact Message Incoming

Name: {{ $details['name'] }}<br />
Email: {{ $details['email'] }}<br />
Subject: {{ $details['subject'] }}<br />
Message: {{ $details['message'] }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>