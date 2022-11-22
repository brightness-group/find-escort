@component('mail::message')
# Hi {{ $details['user']->username }}, 
@if($details['type'] == "fromAllCategories")
List of Girls that match your profile
@elseif($details['type'] == "fromMyPreferences")
Lists of Girls that match your preferences
@endif

@component('mail::table')
| Name    	| Profile URL                          	|
|----------	|-----------------------------------	|
@if( count($details['girls']) > 0 )
@foreach($details['girls'] as $key => $singleGirls)
| {{ $singleGirls->username }}    	| <a href="{{route('home')}}/escort/{{$singleGirls->username}}">Click Here</a>    		|
@endforeach	
@endif
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent