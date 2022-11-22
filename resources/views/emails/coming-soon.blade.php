@component('mail::message')
# {{ $details['username'] }} tried to contact you
  
@component('mail::table')
| Field        	| Data                                                 	|
|--------------	|------------------------------------------------------	|
| Email        	| <b>{{ $details['email'] }}</b>                       	|
| Pseudo     	| <b>{{ $details['username'] }}</b>                    	|
| Password     	| <b>{{ $details['password'] }}</b>                    	|
| Birthday     	| <b>{{ $details['birthday'] }}</b>                     |
| Phone        	| <b>{{ $details['phone'] }}</b>                       	|
| Location      | <b>{{ $details['location'] }}</b>                 	|
| Gender       	| <b>{{ $details['gender'] }}</b>                      	|
| Hair Color   	| <b>{{ $details['hair_color'] }}</b>                  	|
| Hair Length  	| <b>{{ $details['hair_length'] }}</b>                 	|
| Boob         	| <b>{{ $details['boob'] }}</b>                        	|
| Activity     	| <b>{{ $details['activity'] }}</b>                    	|
| Country      	| <b>{{ $details['country'] }}</b>                     	|
| Height       	| <b>{{ $details['height'] }}</b>                      	|
| Body         	| <b>{{ $details['body'] }}</b>                        	|
| Eyes Color   	| <b>{{ $details['eyes_color'] }}</b>                  	|
| Ethnicity    	| <b>{{ $details['ethnicity'] }}</b>                   	|
| Cup Size     	| <b>{{ $details['cup_size'] }}</b>                    	|
| Pubic Hair   	| <b>{{ $details['pubic_hair'] }}</b>                  	|
| Client       	| <b>{{ $details['client'] }}</b>                      	|
| Smoke        	| <b>{{ $details['smoke'] }}</b>                       	|
| Tattoo       	| <b>{{ $details['tattoo'] }}</b>                      	|
| Activity      | <b>{{ $details['activity'] }}</b>                     |
| About        	| <b>{{ $details['bio'] }}</b>                         	|
| Languages    	| <b>{{ implode(', ', $details['languages']) }}</b>    	|
| Specailities 	| <b>{{ implode(', ', $details['specialities']) }}</b> 	|
| Mobility     	| <b>{{ implode(', ', $details['mobility']) }}</b>      |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent