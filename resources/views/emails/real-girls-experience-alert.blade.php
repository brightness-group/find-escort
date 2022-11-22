@component('mail::message')
# Hi {{ $details['user']->username }}, 
@if($details['type'] == "realGirlsInAllLocations")
RGE from All Locations
@elseif($details['type'] == "realGirlsInMyLocations")
RGE from Your Locations
@endif

@component('mail::table')
| RGE    	| Profile URL                          	|
|----------	|-----------------------------------	|
@if( count($details['realGirls']) > 0 )
@foreach($details['realGirls'] as $key => $singleGirls)
| {{ $singleGirls->user->username }}    	| <a href="{{route('home')}}/escort/{{$singleGirls->user->username}}">Click Here</a>    		|
@endforeach	
@endif
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent