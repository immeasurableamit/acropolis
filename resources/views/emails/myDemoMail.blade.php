@component('mail::message')
# {{$details['title']}}


You are invited to take React Developer survey on Saindex.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

If you did not recognize the survey, no further action is required.



Thanks,<br>
{{ config('app.name') }}
@endcomponent
