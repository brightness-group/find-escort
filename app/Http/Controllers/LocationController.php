<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\LocationSuggestion;
use App\Models\Location;
use App\Models\Experience;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLocation;

class LocationController extends Controller
{
    public function postLocation(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $input['location_changed_at'] = Carbon::now();
        $user->update($input);
        
        return response()->json(Carbon::now()->diffForHumans(['options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS | Carbon::TWO_DAY_WORDS]));
    }

    public function getLocationSuggestion(Request $request)
    {
        $cities = LocationSuggestion::all();
        return response()->json($cities);
    }

    public function postLocationSuggestion(Request $request)
    {
        $locationSuggestion       = new LocationSuggestion;
        $locationSuggestion->name = $request->name;
        $locationSuggestion->city = $request->city;
        $locationSuggestion->address = $request->address;
        $locationSuggestion->zipcode = $request->zipcode;
        $locationSuggestion->save();

        return redirect( url()->previous() );
    }

    public function getLocations(Request $request)
    {
        
        $userLocations = array();
        $userLocationsIDs = array();
        $user = Auth::user();
        
        $response = User::with([
                                'user_locations.location.city'
                            ])
                            ->find($user->id);

        foreach ($response->user_locations as $key => $value) {
            $userLocationsIDs[] = $value->location->id;
            $userLocations[$value->location->city->name][$value->id]['name'] = $value->location->name;
            $userLocations[$value->location->city->name][$value->id]['lat'] = $value->location->lat;
            $userLocations[$value->location->city->name][$value->id]['long'] = $value->location->long;
        }

        $orderby =  $request->orderby ? $request->orderby : 'asc';

        ksort($userLocations); //Default ASC sorting
        if($orderby == 'desc')
            krsort($userLocations);

        $locations = Location::with([
                                'city'
                            ])
                            ->whereNotIn('id', $userLocationsIDs)
                            ->get();
        
        if($user->role == 'escort'){
            return view('escorts.locations', compact('user','userLocations', 'locations'));    
        }else if($user->role == 'customer'){
            return view('customers.locations', compact('user','userLocations', 'locations'));
        }
    }

    public function getLocationsAjaxCall(Request $request)
    {
        
        $userLocations = array();
        $userLocationsIDs = array();
        $user = Auth::user();
        
        $response = User::with([
                                'user_locations.location' => function ($query) use($request) {
                                        $query->where('name', 'like', "%{$request->search}%");
                                 },
                                'user_locations.location.city'
                            ])
                            ->find($user->id);
    

        foreach ($response->user_locations as $key => $value) {
            if($value->location){
                $userLocationsIDs[] = $value->location->id;
                $userLocations[$value->location->city->name][$value->id]['name'] = $value->location->name;
                $userLocations[$value->location->city->name][$value->id]['lat'] = $value->location->lat;
                $userLocations[$value->location->city->name][$value->id]['long'] = $value->location->long;                    
            }
        }


        $orderby =  $request->orderby ? $request->orderby : 'asc';

        ksort($userLocations); //Default ASC sorting
        if($orderby == 'desc')
            krsort($userLocations);

        $locations = Location::with([
                                'city'
                            ])
                            ->whereNotIn('id', $userLocationsIDs)
                            ->get();
        
        if($user->role == 'escort'){
            return view('escorts.locations-data', compact('user','userLocations', 'locations'))->render();
        }else if($user->role == 'customer'){
            return view('customers.locations-data', compact('user','userLocations', 'locations'))->render();
        }
    }

    public function deleteUserLocation(Request $request)
    {
        $user = Auth::user();
        UserLocation::where('id', '=', $request->user_location_id)->delete();
        
        
        if($user->role == 'escort'){
            return redirect(route('escorts.profile.locations'));
        }else if($user->role == 'customer'){
            return redirect(route('customers.profile.locations'));
        }
    }

    public function postAddUserLocation(Request $request)
    {
        $user = Auth::user();
        UserLocation::where('id', '=', $request->user_location_id)->delete();

        $record_exists = UserLocation::where([
                                        ['user_id', '=', Auth::user()->id ],
                                        ['location_id', '=', $request->location_id ],
                                ])->first();

        if ($record_exists === null) {
            $user_location = new UserLocation;
            $user_location->location_id = $request->location_id; 
            $user_location->user_id   = Auth::user()->id;
            $user_location->save();
        }else{
            $record_exists->delete();
        }

        return response()->json('true');
    }
    
    public function realGirlFriendExperienceSwitch(Request $request){
        $user = Auth::user();
        $user->real_girlfriend_experience = $request->get('real_girlfriend_experience', 0);
        $user->save();
        return redirect( url()->previous() );
    }

    public function getRealGirlFriendExperienceForEscort(Request $request)
    {
        
        $user = Auth::user();
        
        $experiences = User::with([
                                'user_experiences' => function ($query) {
                                            $query->orderByDesc('id')->limit(5)
                                            ->where('date', '>=', Carbon::now()->toDateTimeString());
                                            //->where('from', '<=', Carbon::now()->format('H:i:s'))
                                            //->where('to', '>=', Carbon::now()->format('H:i:s'));
                                        },
                                'user_experiences.location.city'
                            ])
                            ->find($user->id);
        
        $locations = Location::with([
                                'city'
                            ])->get();
        
        $get_times = $this->get_times();
        
        return view('escorts.real-girlfriend-experience', compact('user', 'locations', 'get_times', 'experiences'));
    }

    public function getRealGirlFriendExperienceForCustomer(Request $request)
    {
        $experiences = User::with([
                                'user_experiences' => function ($query) {
                                            $query->orderByDesc('id')->limit(5)
                                            ->where('date', '>=', Carbon::now()->toDateTimeString());
                                            //->where('from', '<=', Carbon::now()->format('H:i:s'));
                                            //->where('to', '>=', Carbon::now()->format('H:i:s'));
                                        },
                                'user_experiences.location.city'
                            ])
                            ->where('role', 'escort')
                            ->get();
        
        return view('customers.real-girlfriend-experience', compact('experiences'));
    }


    public function getRealGirlFriendExperienceInCustomerLocation(Request $request)
    {
        $user = Auth::user();
        $response = User::with([
                                    'user_locations'
                                ])
                                ->find($user->id);

        if($request->show_girls_in_my_location == 'true'){

            $experiences = User::with([
                                'user_experiences' => function ($query) use($response) {
                                            $query->whereIn('location_id', $response->user_locations->pluck('location_id') )
                                            ->orderByDesc('id')->limit(5)
                                            ->where('date', '>=', Carbon::now()->toDateTimeString());
                                            //->where('from', '<=', Carbon::now()->format('H:i:s'))
                                            //->where('to', '>=', Carbon::now()->format('H:i:s'));
                                        },
                                'user_experiences.location.city'
                            ])
                            ->where('role', 'escort')
                            ->get();

        }else{

            $experiences = User::with([
                                'user_experiences' => function ($query) {
                                            $query->orderByDesc('id')->limit(5)
                                            ->where('date', '>=', Carbon::now()->toDateTimeString());
                                            //->where('from', '<=', Carbon::now()->format('H:i:s'))
                                            //->where('to', '>=', Carbon::now()->format('H:i:s'));
                                        },
                                'user_experiences.location.city'
                            ])
                            ->where('role', 'escort')
                            ->get();    
        }
        
        return view('customers.real-girlfriend-experience-left-section', compact('experiences'));
    }

    public function addExperience(Request $request){

        $validated = $request->validateWithBag('addexperience',[
            'location_id'      => 'required',
            'year'             => 'required',
            'month'            => 'required',
            'day'              => 'required',
            'from'             => 'required',
            'to'               => 'required',
            'message'          => 'required'
        ]);
        $date = Carbon::createFromIsoFormat('!YYYY-MMMM-D', $request->year.'-'.$request->month.'-'.$request->day, 'UTC')->format('Y-m-d');
        //$date = Carbon::parse($request->year.'-'.$request->month.'-'.$request->day)->format('Y-m-d');

        $experience                 = new Experience();
        $experience->user_id        = Auth::user()->id;
        $experience->location_id    = $request->location_id;
        $experience->date           = $date;
        $experience->from           = $request->from;
        $experience->to             = $request->to;
        $experience->message        = $request->message;
        $experience->save();     
        return redirect( url()->previous() );
    }

    /**
     *
     * Get times as option-list.
     *
     * @return string List of times
     */
    public function get_times ($default = '19:00', $interval = '+30 minutes') {

        $output = '';

        $current = strtotime('00:00');
        $end = strtotime('23:59');

        while ($current <= $end) {
            $time = date('H:i', $current);
            $sel = ($time == $default) ? ' selected' : '';

            $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
            $current = strtotime($interval, $current);
        }

        return $output;
    }


    public function getFavouritePlaces(Request $request){

        $userLocations = array();
        $user = Auth::user();
        if( $request->show_favourite && $request->show_favourite == 'true'){
            $response = User::with([
                                    'user_locations.location.city'
                                ])
                                ->find($user->id);
            
            foreach ($response->user_locations as $key => $value) {
                $userLocations[$value->location->id] = $value->location->name;
            }    
        }else{
            $userLocations = Location::get()->pluck('name', 'id');
        }
        
        return response()->json($userLocations);
    }
}
