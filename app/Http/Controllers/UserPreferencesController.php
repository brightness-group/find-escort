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

use App\Models\Language;
use App\Models\Body;
use App\Models\Ethnicity;
use App\Models\CupSize;

class UserPreferencesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user             = Auth::user();
        $specialities     = Speciality::all();
    	$age_categories   = Age::all();
        $user_preferences = UserPreferences::where('user_id', '=', Auth::user()->id)->get();

        $alllanguages     = Language::all();
        $bodies           = Body::all();
        $ethnicity        = Ethnicity::all();
        $cup_size         = CupSize::all();

        return view('customers.preferences', compact(
                                                        'user', 
                                                        'specialities', 
                                                        'age_categories', 
                                                        'user_preferences',
                                                        'alllanguages',
                                                        'bodies',
                                                        'ethnicity',
                                                        'cup_size'
                                                    )
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $UserPreferences                = new UserPreferences();
        $UserPreferences->user_id 		= Auth::user()->id;
        $UserPreferences->name 			= $request->preference_title;
        $UserPreferences->specialities	= serialize($request->specialities);
        $UserPreferences->ages 			= serialize($request->age_categories);
        $UserPreferences->certified 	= $request->certified ? $request->certified : 0;
        $UserPreferences->girls 		= $request->girls ? $request->girls : 0;
        $UserPreferences->trans         = $request->trans ? $request->trans : 0;
        $UserPreferences->language      = serialize($request->language);
        $UserPreferences->ethnicity     = serialize($request->ethnicity);
        $UserPreferences->body          = serialize($request->body);
        $UserPreferences->cup_size 		= serialize($request->cup_size);
        $UserPreferences->save();

        return redirect(route('customers.profile.my.preferences'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user             = Auth::user();
        $specialities     = Speciality::all();
    	$age_categories   = Age::all();
        $user_preferences = UserPreferences::find($id);

        $alllanguages     = Language::all();
        $bodies           = Body::all();
        $ethnicity        = Ethnicity::all();
        $cup_size         = CupSize::all();
        return view('customers.edit-preferences', compact(
                                                            'user', 
                                                            'specialities', 
                                                            'age_categories', 
                                                            'user_preferences',
                                                            'alllanguages',
                                                            'bodies',
                                                            'ethnicity',
                                                            'cup_size'
                                                        )
                    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    	$UserPreferences = UserPreferences::find($id);
        $UserPreferences->user_id 		= Auth::user()->id;
        $UserPreferences->name 			= $request->preference_title;
        $UserPreferences->specialities	= serialize($request->specialities);
        $UserPreferences->ages          = serialize($request->age_categories);
        $UserPreferences->certified 	= $request->certified ? $request->certified : 0;
        $UserPreferences->girls 		= $request->girls ? $request->girls : 0;
        $UserPreferences->trans 		= $request->trans ? $request->trans : 0;
        $UserPreferences->language      = serialize($request->language);
        $UserPreferences->ethnicity     = serialize($request->ethnicity);
        $UserPreferences->body          = serialize($request->body);
        $UserPreferences->cup_size      = serialize($request->cup_size);
        $UserPreferences->save();

        return redirect(route('customers.profile.my.preferences'));
        //return redirect()->back()->withSuccess('Page updated successfully.');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $UserPreferences = UserPreferences::find($id);
        $UserPreferences->delete();
    	return redirect(route('customers.profile.my.preferences'));
    }

    public function activeSavedSearch(Request $request){
        $user = Auth::user();
        $user->save_preferences = 0;
        if($request->active_saved_search == 1)
            $user->save_preferences = 1;
        $user->save();
        return response()->json(true);
    }

    public function getSavedSearch(Request $request){
        $UserPreferences                = UserPreferences::find($request->id);
        $UserPreferences->specialities  = unserialize($UserPreferences->specialities);
        $UserPreferences->ages          = unserialize($UserPreferences->ages);
        
        $UserPreferences->language      = unserialize($UserPreferences->language);
        $UserPreferences->ethnicity     = unserialize($UserPreferences->ethnicity);
        $UserPreferences->body          = unserialize($UserPreferences->body);
        $UserPreferences->cup_size      = unserialize($UserPreferences->cup_size);
        
        return response()->json($UserPreferences);
    }
}