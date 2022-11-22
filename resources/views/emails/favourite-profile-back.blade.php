@component('mail::message')
# Hi {{ $details->username }},
Your Favourite Profile {{$girl->username}} is back
<a href="{{route('home')}}/escort/{{$girl->username}}">View Profile</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent