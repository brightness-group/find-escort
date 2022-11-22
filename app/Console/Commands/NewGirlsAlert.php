<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Age;
use App\Models\UserPreferences;
use App\Models\Experience;
use App\Mail\NewGirlsMailAlert;
use Carbon\Carbon;
use Mail;

class NewGirlsAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:newgirls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail when new girls created';

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

                $girls_alert        = $userdata->girls_alert;

                switch ( $girls_alert ) {

                    case '2':
                        $this->fromMyPreferences( $userdata );
                        break;
                    
                    case '3':
                        # From all Categories
                        $this->fromAllCategories( $userdata );
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }
        return 0;
    }

    /*Girls From All Categories*/
    public function fromAllCategories( $userdata ){

        $allGirls   =   User::planActive()
                            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
                            ->get();

        
        if(count($allGirls) > 0 ){
            
            $data = array(
            
                    'type' => 'fromAllCategories',
            );

            $data['user'] = $userdata;
            $data['girls'] = $allGirls;
            Mail::to($userdata->email)->send(new NewGirlsMailAlert($data));    
        }
    }

    /*Girls From My Preferences*/
    public function fromMyPreferences( $userdata ){

        $UserPreferences = UserPreferences::where( 'user_id', $userdata->id )->get();

        if( count( $UserPreferences ) > 0 ){

            $ages = $specialities = $genders = $certified = $language = $ethnicity = $body = $cup_size = array();

            foreach ($UserPreferences as $key => $singlePreference) {

                $ages             = array_merge($ages, unserialize( $singlePreference->ages ));
                $specialities     = array_merge($specialities, unserialize( $singlePreference->specialities )); //Applied
                $genders[]        = $singlePreference->girls ? 'girls' : NULL; //Applied
                $genders[]        = $singlePreference->trans ? 'trans' : NULL;
                $certified[]      = $singlePreference->certified ?? NULL;

                $language         = array_merge($language, unserialize( $singlePreference->language )  ?? array() );
                $ethnicity        = array_merge($ethnicity, unserialize( $singlePreference->ethnicity) ?? array() );
                $body             = array_merge($body, unserialize( $singlePreference->body )  ?? array() );
                $cup_size         = array_merge($cup_size, unserialize( $singlePreference->cup_size )  ?? array() );
            }

           
            //$genders = $categories = array();
            $query = User::query();
            $query->planActive();
            $query->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString());
            $query->where(function ($q) {
                    return $q->where('regional', 1)
                            ->orWhere('booster', 1)
                            ->orWhere('booster', 0)
                            ->orWhereNull('booster');
                    });
            
            $query->where('role', '=', 'escort');

            $age_categories = Age::find($ages)->pluck('name');

            if( !empty($age_categories) ){
                foreach ($age_categories as $key => $age_category) {
                    if($age_category != null){
                        $ages = preg_split("/\+|\-/", $age_category);
                        $age_categories_min_max_array[] = $min_age = $ages[0];
                        $age_categories_min_max_array[] = $max_age = (isset($ages[1]) && !empty($ages[1])) ? $ages[1] : '100';    

                        $query->when( $min_age  , function ($q) use($min_age, $max_age, $key) {
                            $minDate = Carbon::today()->subYears($max_age + 1);
                            $maxDate = Carbon::today()->subYears($min_age)->endOfDay();

                            if($key > 0){
                              return  $q->orWhereBetween('birthday', [$minDate, $maxDate]);   
                            }
                            
                            return $q->whereBetween('birthday', [$minDate, $maxDate]);
                        });
                    }
                }
            }

            $query->when( $language  , function ($q) use($language) {
                return $q->whereHas('languages', function ($sq) use($language) {
                            $sq->whereIn('languages.id', $language);
                        });
            });

            $query->when($ethnicity, function ($q) use($ethnicity) {
                return $q->whereIn('ethnicity_id', $ethnicity);
            });

            $query->when($body, function ($q) use($body) {
                return $q->whereIn('body_id', $body);
            });

            $query->when($cup_size, function ($q) use($cup_size) {
                return $q->whereIn('cup_size_id', $cup_size);
            });

            $query->when( $specialities  , function ($q) use($specialities) {
                return $q->whereHas('specialities', function ($sq) use($specialities) {
                            $sq->whereIn('id', $specialities);
                        });
            });

            $query->when(in_array('girls', $genders), function ($q) {
                return $q->where('gender', '=', "female");
            });

            $query->when(in_array('trans', $genders), function ($q) {
                return $q->where('gender', '=', "transgender");
            });

            $allGirls = $query->get();

            

            if(count($allGirls) > 0 ){
            
                $data = array(
                
                        'type' => 'fromMyPreferences',
                );

                $data['user']  = $userdata;
                $data['girls'] = $allGirls;
                Mail::to($userdata->email)->send(new NewGirlsMailAlert($data));    
            }
        }
    }
}