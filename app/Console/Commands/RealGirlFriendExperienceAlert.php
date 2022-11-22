<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Age;
use App\Models\UserPreferences;
use App\Models\Experience;
use App\Mail\RealGirlExperiencesMailAlert;
use Carbon\Carbon;
use Mail;

class RealGirlFriendExperienceAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:rge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Real GirlFriend Experience Alert';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users  =   User::where('role', '=',  'customer')
                        ->where('email_notification', '=',  '1')
                        ->get();

        $number_of_users = count( $users );

        if($number_of_users > 0){
            foreach ($users as $key => $userdata) {

                $real_girls_alert   = $userdata->real_girls_alert;
                
                switch ( $real_girls_alert ) {
                    case '2':
                        # Girls in My Location
                        $this->realGirlsInMyLocations( $userdata );
                        break;
                    
                    case '3':
                        # Girls in all locations
                        $this->realGirlsInAllLocations( $userdata );
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }
        return 0;
    }


    /*Real Girls in My Locations*/
    public function realGirlsInMyLocations( $userdata ){

        $response = User::with([
                        'user_locations'
                    ])
                    ->find($userdata->id);
        
        $realGirls = Experience::where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
                                ->whereIn('location_id', $response->user_locations->pluck('location_id') )
                                ->get()
                                ->unique('user_id');
        
        if(count($realGirls) > 0 ){
            $data = array(
                    'type'      => 'realGirlsInMyLocations',
            );

            $data['user']       = $userdata;
            $data['realGirls']  = $realGirls;
            Mail::to($userdata->email)->send(new RealGirlExperiencesMailAlert($data));    
        }
    }


    /*Real Girls in All Locations*/
    public function realGirlsInAllLocations( $userdata ){
        $realGirls = Experience::where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())->get()->unique('user_id');
        /*
            foreach ($realGirls as $key => $singleRealGirl) {
                echo $singleRealGirl->user->email."<br>";
            }
        */
        if(count($realGirls) > 0 ){
            $data = array(
                    'type'      => 'realGirlsInAllLocations',
            );

            $data['user']       = $userdata;
            $data['realGirls']  = $realGirls;
            Mail::to($userdata->email)->send(new RealGirlExperiencesMailAlert($data));    
        }
    }
}