@component('mail::message')
# {{ $details['name'] }} tried to contact you
  
@component('mail::table')
| Field    	| Data                              	|
|----------	|-----------------------------------	|
| Name    	| <b>{{ $details['name'] }}</b>    		|
| Email    	| <b>{{ $details['email'] }}</b>    	|
| Subject  	| <b>{{ $details['subject'] }}</b>    	|
| Message  	| <b>{{ $details['message'] }}</b>  	|
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent