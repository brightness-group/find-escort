<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateBoostRanking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update boost ranking every 30 min';

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
        $users  =   User::planActive()
                        ->Where('booster', 1)
                        ->where('boost_ranking', '>',  0)
                        ->orderBy('boost_ranking', 'DESC')
                        ->get();

        $number_of_users = count( $users );

        if ( $number_of_users > 0 ) {
            
            $loop = 1;
            
            foreach ($users as $key => $userdata) {
                
                if($loop == 1){
                    $userdata->boost_ranking = $loop;
                }else{
                    $userdata->boost_ranking = $number_of_users--;
                }

               $userdata->save();
               $loop++;
            }
        }

        return 0;
    }
}