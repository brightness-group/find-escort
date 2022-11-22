<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\State;
use App\Models\City;
class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states_id  = State::where('country_id', 212)->pluck('id');
        $cities     = City::whereIn('state_id', $states_id)->get();

    	$locations = Location::with([
                                'city'
                            ])
                            ->orderBy('id', 'desc')
                            ->get();
		
		return view('admin.locations.locations', compact('locations', 'cities'));
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
        $validated = $request->validateWithBag('adminAddLocation',[
            'name'      => 'required',
            'city_id'   => 'required',
            'lat'       => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'long'      => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        Location::create($request->all());
    	return Redirect::route('locations.index');
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
        $single_location = Location::find($id);
    	return view('admin.locations.edit-location', compact('single_location', 'cities'));
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
        $single_location = Location::find($id);
    	$single_location->update($request->all());
    	return Redirect::route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
    	return Redirect::route('locations.index');
    }


    public function bulkDestroy(Request $request)
    {
    	$ids = explode(",", $request->location_ids);
        Location::whereIn('id', $ids)->delete();
        return Redirect::route('locations.index');
    }
}
