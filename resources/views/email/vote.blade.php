@component('mail::message')
# Hello {{ Auth::user()->first_name }},

{{ $message }}



Thanks for using this platform,<br>
{{ config('app.name') }}
@endcomponent
