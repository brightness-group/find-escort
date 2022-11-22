<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Response;

use App\Models\State;
use App\Models\City;
use App\Models\Country;
use App\Models\EyesColor;
use App\Models\HairColor;
use App\Models\Body;
use App\Models\Speciality;
use App\Models\Language;
use App\Models\HairLength;
use App\Models\Ethnicity;
use App\Models\CupSize;
use App\Models\Boob;
use App\Models\PubicHair;
use App\Models\Client;
use App\Models\Smoke;
use App\Models\Tattoo;
use App\Models\Activity;


class ComingSoonController extends Controller
{
    public function getForm(Request $request)
    {
    	$states_id  = State::where('country_id', 212)->pluck('id');
        $cities     = City::whereIn('state_id', $states_id)->get();
        
        $countries        = Country::all();
        $eyes_colors      = EyesColor::all();
        $hair_colors      = HairColor::all();
        $bodies           = Body::all();
        $specialities     = Speciality::all();
        $alllanguages     = Language::all();
        $hair_length      = HairLength::all();
        $ethnicity        = Ethnicity::all();
        $cup_size         = CupSize::all();  
        $boobs            = Boob::all();  
        $pubic_hair       = PubicHair::all();
        $clients          = Client::all();
        $smoke            = Smoke::all();
        $tattoos          = Tattoo::all();
        $activities          = Activity::all();

        return view('coming-soon', compact(
                                        'cities', 
                                        'countries', 
                                        'eyes_colors', 
                                        'hair_colors', 
                                        'bodies',
                                        'specialities',
                                        'alllanguages',
                                        'hair_length',
                                        'ethnicity',
                                        'cup_size',
                                        'boobs',
                                        'pubic_hair',
                                        'clients',
                                        'smoke',
                                        'tattoos',
                                        'activities'
                                    ));
    }
}
