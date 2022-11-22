<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\LocationSuggestion;
use App\Models\Location;
use App\Models\State;
use App\Models\City;

class SuggestedLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggested_locations = LocationSuggestion::orderBy('id', 'desc')->get();
        
        return view('admin.locations.suggested-locations', compact('suggested_locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states_id  = State::where('country_id', 212)->pluck('id');
        $cities     = City::whereIn('state_id', $states_id)->get();
        $single_suggested_location = LocationSuggestion::find($id);
        return view('admin.locations.edit-suggested-location', compact('single_suggested_location', 'cities'));
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
        $validated = $request->validateWithBag('adminAddLocation',[
            'name'      => 'required',
            'city_id'   => 'required',
            'lat'       => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'long'      => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        Location::create($request->all());

        $suggested_location = LocationSuggestion::find($id);
        $suggested_location->delete();
        
        return Redirect::route('suggested-locations.index')->with('success', 'Suggested Location added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suggested_location = LocationSuggestion::find($id);
        $suggested_location->delete();
        return Redirect::route('suggested-locations.index');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = explode(",", $request->location_ids);
        LocationSuggestion::whereIn('id', $ids)->delete();
        return Redirect::route('suggested-locations.index');
    }
}
