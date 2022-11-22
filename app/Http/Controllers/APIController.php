<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Like;
use App\Models\User;
use App\Models\Settings;
use App\Models\Event;
use Carbon\Carbon;
use App\Providers\NewLike;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function getCityList(Request $request)
    {
        
        $cities = City::join('states', 'cities.state_id', '=', 'states.id')
             ->join('countries', 'states.country_id', '=', 'countries.id')
             ->select(
                    'cities.name',
                    'cities.id'
                )
             ->where('states.country_id', $request->country_id)
             ->orderBy('cities.name', 'ASC')
             ->pluck('cities.name',
                    'cities.id');

        return response()->json($cities);
    }

    public function postLike(Request $request){
        
        $record_exists = Like::where([
                                        ['escort_id', '=', $request->id ],
                                        ['user_id', '=', Auth::user()->id ],
                                        ['type', '=', $request->type ],
                                ])->first();

        if ($record_exists === null) {
            $like            = new Like;
            $like->escort_id = $request->id; 
            $like->user_id   = Auth::user()->id;
            $like->type      = $request->type; 
            $like->save();
        }else{
            $record_exists->delete();
        }

        /*
            Add like Event for Notification
        */
        event(new NewLike($request));
        
        $user = User::find($request->id);
        return response()->json($user->getLikes());
    }

    public function referFriendSMS(Request $request){
        $validated = $request->validate([
            'phone_number'     => 'required',
        ]);

        $user = Auth::user();

        $data = array();

        $data['referral_link']  = $user->getReferralLinkAttribute();
        $data['username']       = $user->username;

        $sms_global_secret  = Settings::where('meta_key', 'sms_global_secret')->pluck('meta_value')->toArray();
        $sms_global_key     = Settings::where('meta_key', 'sms_global_key')->pluck('meta_value')->toArray();

        // get your REST API keys from MXT https://mxt.smsglobal.com/integrations
        \SMSGlobal\Credentials::set($sms_global_key['0'], $sms_global_secret['0']);

        $sms = new \SMSGlobal\Resource\Sms();

        try {
            $response = $sms->sendToOne(
                                        $request->phone_number, 
                                        $data['username'] .' referred you. Click this link '. $data['referral_link'] .' to register on findher and earn free addon'
                                    );
        } catch (\Exception $e) {
        }
        return redirect( url()->previous() );
    }
}