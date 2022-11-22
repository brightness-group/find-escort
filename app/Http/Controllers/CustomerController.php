<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Speciality;
use App\Models\Age;
use App\Models\UserLocation;
use App\Models\User;
use App\Models\Like;
use App\Models\UserPreferences;

class CustomerController extends Controller
{
    public function getProfile(Request $request)
    {
    	$user      = Auth::user();
        $favourite_users =    User::find(
                                    Like::where([
                                        ['user_id', '=', Auth::user()->id ],
                                        ['type', '=', 'like' ],
                                        ])->pluck("escort_id")
                                    );
        
        return view('customers.profile', compact('user', 'favourite_users'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        //return redirect(route('customers.profile'));
    }
   
    public function getAccountDetails(Request $request)
    {
        $user = Auth::user();
        return view('customers.account-details', compact(
                                                'user'
                                            )
        );
    }

    public function UpdateAccountDetails(Request $request)
    {

        $user = Auth::user();

        $request->validate([
		    'email'     => 'required|string|email|max:255|unique:users,email,'.$user['id'],
            'password'  => 'nullable|confirmed|string|min:8',
		]);

        $user->email              = $request->email ? $request->email : 0;
        $user->girls_alert        = $request->girls_alert ? $request->girls_alert : 0;
        $user->real_girls_alert   = $request->real_girls_alert ? $request->real_girls_alert : 0;
        $user->email_notification = $request->email_notification ? $request->email_notification : 0;
            
        if( null !== $request->password )
            $user->password = Hash::make($request->password);

        $user->save();
        
        return redirect(route('customers.profile.account.details'));
    }
}
