@component('mail::message')
# New message from {{ $name }}

### Phone: {{ $phone }}

{{ $message }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
