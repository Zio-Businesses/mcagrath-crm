@component('mail::message')
# @lang('email.hello')@if(!empty($notifiableName)){{ ' '.$notifiableName }}@endif!

@if (!empty($content))

@component('mail::text', ['text' => $content])

@endcomponent
@endif


@lang('email.regards'),<br>
{{ config('app.name') }}
@endcomponent
