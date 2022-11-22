<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Providers\NewView;
class View extends Model
{
    use HasFactory;
    public static function createViewLog($user) {
        $view = new View();
        $view->escort_id 	= $user->id;
        $view->user_id 		= (\Auth::check())?\Auth::id():null;
        $view->count 		= 1;
        $view->url 			= \Request::url();
        $view->session_id 	= \Request::getSession()->getId();
        $view->ip 			= \Request::getClientIp();
        $view->agent 		= \Request::header('User-Agent');
        $view->save();


        /*
            Add like Event for Notification
        */
        event(new NewView($user));
    }
}
