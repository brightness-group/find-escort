<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Speciality;
use App\Models\Location;
use App\Models\City;
use App\Models\State;
use App\Models\Plan;
use App\Models\View;
use App\Models\Addon;
use App\Models\AddonType;
use App\Models\Media;
use App\Models\Country;
use App\Models\EyesColor;
use App\Models\HairColor;
use App\Models\HairLength;
use App\Models\Ethnicity;
use App\Models\CupSize;
use App\Models\Boob;
use App\Models\PubicHair;
use App\Models\Client;
use App\Models\Smoke;
use App\Models\Tattoo;
use App\Models\Activity;
use App\Models\Body;
use App\Models\Language;
use App\Models\UserHiddenLocation;
use App\Models\Age;
use App\Models\UserPreferences;
use Cache;
class CategoryController extends Controller
{
    public function getGirls(Request $request)
    {
        //$states             = State::where('country_id', 212)->get();
        $states = Cache::remember('states', 604800, function () {
                    return State::where('country_id', 212)->get();
                });

        $states_id          = $states->pluck('id');     
        //$cities             = City::whereIn('state_id', $states_id)->get();
        $cities             = Cache::remember('cities', 604800, function () use ($states_id) {
                                return City::whereIn('state_id', $states_id)->get();
                            });

        $pouplar_escort_ids = View::select('escort_id', View::raw('count(count) as total'))
                                ->orderBy('total', 'desc')
                                ->groupBy('escort_id')
                                ->pluck('escort_id', 'total')
                                ->toArray();

        //$countries          = Country::all();
        $countries = Cache::remember('countries', 604800, function () {
                    return Country::all();
                });

        //$eyes_colors        = EyesColor::all();
        $eyes_colors = Cache::remember('eyes_colors', 604800, function () {
                    return EyesColor::all();
                });

        //$hair_colors        = HairColor::all();
        $hair_colors = Cache::remember('hair_colors', 604800, function () {
                    return HairColor::all();
                });

        //$bodies             = Body::all();
        $bodies = Cache::remember('bodies', 604800, function () {
                    return Body::all();
                });

        //$specialities       = Speciality::all();
        $specialities = Cache::remember('specialities', 604800, function () {
                    return Speciality::all();
                });

        //$alllanguages       = Language::all();
        $alllanguages = Cache::remember('alllanguages', 604800, function () {
                    return Language::all();
                });

        //$hair_length        = HairLength::all();
        $hair_length = Cache::remember('hair_length', 604800, function () {
                    return HairLength::all();
                });

        //$ethnicity          = Ethnicity::all();
        $ethnicity = Cache::remember('ethnicity', 604800, function () {
                    return Ethnicity::all();
                });

        //$cup_size           = CupSize::all();  
        $cup_size = Cache::remember('cup_size', 604800, function () {
                    return CupSize::all();
                });

        //$boobs              = Boob::all();  
        $boobs = Cache::remember('boobs', 604800, function () {
                    return Boob::all();
                });

        //$pubic_hair         = PubicHair::all();
        $pubic_hair = Cache::remember('pubic_hair', 604800, function () {
                    return PubicHair::all();
                });

        //$clients            = Client::all();
        $clients = Cache::remember('clients', 604800, function () {
                    return Client::all();
                });

        //$smoke              = Smoke::all();
        $smoke = Cache::remember('smoke', 604800, function () {
                    return Smoke::all();
                });

        //$tattoos            = Tattoo::all();
        $tattoos = Cache::remember('tattoos', 604800, function () {
                    return Tattoo::all();
                });

        //$activities         = Activity::all();
        $activities = Cache::remember('activities', 604800, function () {
                    return Activity::all();
                });

        //$age_categories     = Age::all();
        $age_categories = Cache::remember('age_categories', 604800, function () {
                    return Age::all();
                });


        $escorts    = User::planActive()
                            ->where(function ($q) {
                                        return $q->where('regional', 1)
                                                ->orWhere('booster', 1)
                                                ->orWhere('booster', 0)
                                                ->orWhereNull('booster');
                                    })
                            ->where([
                                ['role', 'escort'],
                                ['gender', 'female'],
                                ])
                            ->orderby('booster', 'desc')
                            ->paginate(16);

        $user_preferences = array();

        if (Auth::check() && Auth()->user()->role == 'customer'){
            $user_preferences = UserPreferences::where('user_id', '=', Auth::user()->id)->get();
        }

        return view('categories.girls', compact(
                                            'escorts', 
                                            'states',
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
                                            'activities',
                                            'age_categories',
                                            'pouplar_escort_ids',
                                            'user_preferences'
                                            )
                                        );
    }

    public function getTrans(Request $request)
    {
        //$states             = State::where('country_id', 212)->get();
        $states = Cache::remember('states', 604800, function () {
                    return State::where('country_id', 212)->get();
                });

        $states_id          = $states->pluck('id');     
        //$cities             = City::whereIn('state_id', $states_id)->get();
        $cities             = Cache::remember('cities', 604800, function () use ($states_id) {
                                return City::whereIn('state_id', $states_id)->get();
                            });

        
        $pouplar_escort_ids = View::select('escort_id', View::raw('count(count) as total'))
                                ->orderBy('total', 'desc')
                                ->groupBy('escort_id')
                                ->pluck('escort_id', 'total')
                                ->toArray();

                //$countries          = Country::all();
        $countries = Cache::remember('countries', 604800, function () {
                    return Country::all();
                });

        //$eyes_colors        = EyesColor::all();
        $eyes_colors = Cache::remember('eyes_colors', 604800, function () {
                    return EyesColor::all();
                });

        //$hair_colors        = HairColor::all();
        $hair_colors = Cache::remember('hair_colors', 604800, function () {
                    return HairColor::all();
                });

        //$bodies             = Body::all();
        $bodies = Cache::remember('bodies', 604800, function () {
                    return Body::all();
                });

        //$specialities       = Speciality::all();
        $specialities = Cache::remember('specialities', 604800, function () {
                    return Speciality::all();
                });

        //$alllanguages       = Language::all();
        $alllanguages = Cache::remember('alllanguages', 604800, function () {
                    return Language::all();
                });

        //$hair_length        = HairLength::all();
        $hair_length = Cache::remember('hair_length', 604800, function () {
                    return HairLength::all();
                });

        //$ethnicity          = Ethnicity::all();
        $ethnicity = Cache::remember('ethnicity', 604800, function () {
                    return Ethnicity::all();
                });

        //$cup_size           = CupSize::all();  
        $cup_size = Cache::remember('cup_size', 604800, function () {
                    return CupSize::all();
                });

        //$boobs              = Boob::all();  
        $boobs = Cache::remember('boobs', 604800, function () {
                    return Boob::all();
                });

        //$pubic_hair         = PubicHair::all();
        $pubic_hair = Cache::remember('pubic_hair', 604800, function () {
                    return PubicHair::all();
                });

        //$clients            = Client::all();
        $clients = Cache::remember('clients', 604800, function () {
                    return Client::all();
                });

        //$smoke              = Smoke::all();
        $smoke = Cache::remember('smoke', 604800, function () {
                    return Smoke::all();
                });

        //$tattoos            = Tattoo::all();
        $tattoos = Cache::remember('tattoos', 604800, function () {
                    return Tattoo::all();
                });

        //$activities         = Activity::all();
        $activities = Cache::remember('activities', 604800, function () {
                    return Activity::all();
                });

        //$age_categories     = Age::all();
        $age_categories = Cache::remember('age_categories', 604800, function () {
                    return Age::all();
                });


        $escorts            = User::planActive()
                            ->where(function ($q) {
                                        return $q->where('regional', 1)
                                                ->orWhere('booster', 1)
                                                ->orWhere('booster', 0)
                                                ->orWhereNull('booster');
                                })
                            ->where([
                                ['role', 'escort'],
                                ['gender', 'transgender'],
                                ])
                            ->orderby('booster', 'desc')
                            ->paginate(16);

        $user_preferences = array();
        if (Auth::check() && Auth()->user()->role == 'customer'){
            $user_preferences = UserPreferences::where('user_id', '=', Auth::user()->id)->get();
        }
        return view('categories.trans', compact(
                                            'escorts',
                                            'states',
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
                                            'activities',
                                            'age_categories',
                                            'pouplar_escort_ids',
                                            'user_preferences'
                                        ));
    }

    public function ajaxFilter(Request $request)
    {
        if($request->ajax())
        {

            //dd($request->all());
            $genders = $categories = array();

            if($request->genders != null){
                $genders = array_map('trim', explode(',', $request->genders));
            }
            
            if($request->categories != null){
                $categories = array_map('trim', explode(',', $request->categories));
            }
            
            $age_categories = $request->filter_form['age_categories'] ?? null;
            $age_categories_min_max_array = array();


            $language       = $request->filter_form['language'] ?? null;
            $ethnicity      = $request->filter_form['ethnicity'] ?? null;
            $body           = $request->filter_form['body'] ?? null;
            $cup_size       = $request->filter_form['cup_size'] ?? null;
            $specialities   = $request->filter_form['specialities'] ?? null;

            $pouplar_escort_ids = View::select('escort_id', View::raw('count(count) as total'))
                                        ->orderBy('total', 'desc')
                                        ->groupBy('escort_id')
                                        ->pluck('escort_id', 'total')
                                        ->toArray();

            $query = User::query();
            $query->planActive();
            $query->where(function ($q) {
                    return $q->where('regional', 1)
                            ->orWhere('booster', 1)
                            ->orWhere('booster', 0)
                            ->orWhereNull('booster');
                    });
            
            $query->where('role', '=', 'escort');

            if($age_categories != null){
                
                foreach ($age_categories as $key => $age_category) {
                    if($age_category != null){
                        $ages = preg_split("/\+|\-/", $age_category);
                        $age_categories_min_max_array[] = $min_age = $ages[0];
                        $age_categories_min_max_array[] = $max_age = (isset($ages[1]) && !empty($ages[1])) ? $ages[1] : '100';    

                        $query->when( $min_age  , function ($q) use($min_age, $max_age, $key) {
                            $minDate = Carbon::today()->subYears($max_age + 1);
                            $maxDate = Carbon::today()->subYears($min_age)->endOfDay();

                            if($key > 0){
                              return  $q->orWhereBetween('birthday', [$minDate, $maxDate]);   
                            }
                            
                            return $q->whereBetween('birthday', [$minDate, $maxDate]);
                        });
                    }
                }
            }
            

            $query->when( $language  , function ($q) use($language) {
                return $q->whereHas('languages', function ($sq) use($language) {
                            $sq->whereIn('languages.id', $language);
                        });
            });

            $query->when($ethnicity, function ($q) use($ethnicity) {
                return $q->whereIn('ethnicity_id', $ethnicity);
            });

            $query->when($body, function ($q) use($body) {
                return $q->whereIn('body_id', $body);
            });

            $query->when($cup_size, function ($q) use($cup_size) {
                return $q->whereIn('cup_size_id', $cup_size);
            });

            $query->when( $specialities  , function ($q) use($specialities) {
                return $q->whereHas('specialities', function ($sq) use($specialities) {
                            $sq->whereIn('id', $specialities);
                        });
            });

            $query->when(in_array('girls', $genders), function ($q) {
                return $q->where('gender', '=', "female");
            });

            $query->when(in_array('trans', $genders), function ($q) {
                return $q->where('gender', '=', "transgender");
            });

            $query->where(function ($query) use($categories, $pouplar_escort_ids) {

                $query->when(request('location_ids') != null, function ($q) {
                    $location_ids = explode(',', request('location_ids'));
                    return $q->orWhereIn('city_id', $location_ids);
                });

                $query->when(request('canton_ids') != null, function ($q) {
                    $canton_ids = explode(',', request('canton_ids'));
                    return $q->orWhereIn('state_id', $canton_ids);
                });

                $query->when(request('activities_ids') != null, function ($q) {
                    $activities_ids = explode(',', request('activities_ids'));
                    return $q->orWhereIn('activity_id', $activities_ids);
                });
                
                $query->when(in_array('active', $categories), function ($q) {
                    $now = Carbon::now();
                    return $q->orWhere('last_seen', '>', $now->addMinutes(-1));
                });

                $query->when(in_array('popular', $categories), function ($q) use($pouplar_escort_ids) {
                    
                    if(!empty($pouplar_escort_ids))
                        return $q->orWhereIn('id', $pouplar_escort_ids)->orderByRaw(DB::raw("FIELD(id, ".implode(',', $pouplar_escort_ids).")"));
                });

            });

            $query->when(in_array('new', $categories), function ($q) {
                return $q->orderBy('booster', 'desc');
            });
            
            $escorts = $query->paginate(16);
            
            return view('categories.category-content', compact('escorts', 'pouplar_escort_ids'))->render();
        }
    }


    public function getRealGirlfriend(Request $request)
    {
        $states_id          = State::where('country_id', 212)->pluck('id');
        $cities             = City::whereIn('state_id', $states_id)->get();
        return view('categories.real-girlfriend', compact('cities'));
    }
}
