@component('mail::message')
# User registered

The body of your message.
welcome {{$full_name}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
