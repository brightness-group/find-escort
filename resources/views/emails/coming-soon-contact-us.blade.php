@component('mail::message')
# {{ $details['username'] }} tried to contact you
  
@component('mail::table')
| Field    	| Data                              	|
|----------	|-----------------------------------	|
| Email    	| <b>{{ $details['email'] }}</b>    	|
| Pseudo 	| <b>{{ $details['username'] }}</b> 	|
| Message  	| <b>{{ $details['message'] }}</b>  	|
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent