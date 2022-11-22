<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EventController extends Controller
{

	public function getEvents(Request $request){
	       if($request->ajax())
                {
                	$events = Event::where('escort_id',  Auth::user()->id)->orderBy('id', 'DESC')->paginate(6);

                	$user = User::find(Auth::user()->id);
                	$likes = $user->getLikes();
                	$views = $user->getViews();

                	$event_ids = $events->pluck('id');
                	Event::whereIn('id', $event_ids)->update(['read' => 1]);

                	return view('events', compact('events', 'likes', 'views'))->render();
                }
	}
}