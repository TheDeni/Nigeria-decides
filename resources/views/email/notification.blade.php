@component('mail::message')
# Hello {{ $aspirant->name }},

{{ $message }}



Thanks for using this platform,<br>
{{ config('app.name') }}
@endcomponent
