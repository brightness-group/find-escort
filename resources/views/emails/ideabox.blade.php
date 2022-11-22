@component('mail::message')
# {{ $details['name'] }} submitted an Idea
  
@component('mail::table')
| Field    	| Data                              	|
|----------	|-----------------------------------	|
| Name    	| <b>{{ $details['name'] }}</b>    		|
| Title    	| <b>{{ $details['title'] }}</b>    	|
| Idea  	| <b>{{ $details['content'] }}</b>    	|
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent