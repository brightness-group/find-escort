@component('mail::message')
# {{ $details['username'] }} tried to contact you

@component('mail::table')
|               	|                                        	|
|-------------------|-------------------------------------------|
| Referral Link 	| <b>{{ $details['referral_link'] }}</b> 	|
| Pseudo      	    | <b>{{ $details['username'] }}</b>      	|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
