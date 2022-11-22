<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AddonUser;
use App\Models\AddonType;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\View;
use App;
use Carbon\Carbon;
use Cache;
class HomeController extends Controller
{
    public function setLang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function getHomeView(Request $request)
    {
        //$states  = State::where('country_id', 212)->get();
        $states = Cache::remember('states', 604800, function () {
                    return State::where('country_id', 212)->get();
                });

        $states_id  = $states->pluck('id');     

        //$cities    = City::whereIn('state_id', $states_id)->get();
        $cities = Cache::remember('cities', 604800, function () use ($states_id) {
                    return City::whereIn('state_id', $states_id)->get();
                });

        $escort_sliders     = User::where('role', 'escort')
                                ->planActive()
                                ->where(function ($q) {
                                        return $q->where('national', 1)->orWhere('booster', 1);
                                })
                                ->orderBy('boost_ranking', 'DESC')
                                ->get();
        
        if( !count($escort_sliders)){
            $escort_sliders  = User::where('role', 'escort')
                                ->planActive()
                                ->limit(20)
                                ->inRandomOrder()
                                ->get();
        }
        
        /* Logic to show escort in slider end here */

        $last_connections   = User::where('role', 'escort')
                                ->planActive()
                                ->limit(20)
                                ->orderBy('last_seen', 'desc')
                                ->get();

        $find_your_girls    = User::where('role', 'escort')
                                    ->planActive()
                                    ->orderBy('boost_ranking', 'DESC')
                                    ->orderByRaw("FIELD(regional , '1', '0') ASC")
                                    ->paginate(8);

        $find_your_girls_locations = User::where('role', 'escort')
                                    ->planActive()
                                    ->where(function ($q) {
                                        return $q->where('regional', 1)->orWhere('booster', 1);
                                    })
                                    ->orderBy('boost_ranking', 'DESC')
                                    ->get();

        $pouplar_escort_ids = View::select('escort_id', View::raw('count(count) as total'))
                                    ->orderBy('total', 'desc')
                                    ->groupBy('escort_id')
                                    ->pluck('escort_id', 'total')
                                    ->toArray();

        return view('home', compact(
                                    'escort_sliders',
                                    'last_connections',
                                    'states',
                                    'cities',
                                    'find_your_girls',
                                    'find_your_girls_locations',
                                    'pouplar_escort_ids'
                                )
                    );
    }

    public function ajaxFindYourGirls(Request $request)
    {   
        
        if($request->ajax())
        {

            $genders = array();

            if($request->genders != null){
                $genders = explode(',', $request->genders);
            }
            
            $pouplar_escort_ids = View::select('escort_id', View::raw('count(count) as total'))
                                        ->orderBy('total', 'desc')
                                        ->groupBy('escort_id')
                                        ->pluck('escort_id', 'total')
                                        ->toArray();

            $query = User::query();
            $query->planActive();
            /*
            $query->where(function ($q) {
                return $q->where('regional', 1)->orWhere('booster', 1);
            });
            */
            
            $query->orderBy('boost_ranking', 'DESC');
            $query->orderByRaw("FIELD(regional , '1', '0') ASC");
            
            $query->when(request('search') != null, function ($q) use($request) {
                return $q->where('username', 'like', "%{$request->search}%");
            });

            $query->when(in_array('girls', $genders), function ($q) {
                return $q->where('gender', '=', "female");
            });

            $query->when(in_array('trans', $genders), function ($q) {
                return $q->where('gender', '=', "transgender");
            });

            $query->when(request('location_ids') != null, function ($q) {
                $location_ids = explode(',', request('location_ids'));
                return $q->whereIn('city_id', $location_ids);
            });

            $query->when(request('canton_ids') != null, function ($q) {
                $canton_ids = explode(',', request('canton_ids'));
                return $q->whereIn('state_id', $canton_ids);
            });

            $query->when(request('tab') == 'new', function ($q) {
                return $q->orderBy('id', 'desc');
            });

            $query->when(request('tab') == 'certified', function ($q) {
                return $q->where('certified', '=', 1);
            });

            $query->when(request('tab') == 'popular', function ($q) use($pouplar_escort_ids) {
                if(!empty($pouplar_escort_ids))
                    return $q->whereIn('id', $pouplar_escort_ids)->orderByRaw(DB::raw("FIELD(id, ".implode(',', $pouplar_escort_ids).")"));
            });

            $find_your_girls_locations = $query->get();
            
            $find_your_girls = $query->paginate(8);
            
            return view('home-find-your-girls', compact('find_your_girls', 'find_your_girls_locations', 'pouplar_escort_ids'))->render();
        }
    }

    public function searchGirls(Request $request){
        if($request->get('query'))
            {
                $query = $request->get('query');
                $data = User::planActive()->where('name', 'LIKE', "%{$query}%")->get();

                $output = '<ul class="dropdown-menu" style="display:block;position:relative;width: 100%;padding: 5%;max-height: 150px;overflow-y: auto;background: #a80642;">';
                if(count($data)){
                    foreach($data as $row)
                    {
                        $output .= '<li><a href="'.route('home').'/escort/'.$row->username.'"  style="color:#fff" >'.$row->name.'</a></li>';
                    }
                }else{
                    $output .= '<li style="color:#fff;"">No record found</li>';
                }
                $output .= '</ul>';
                echo $output;
            }
    }
}