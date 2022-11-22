<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoworkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = [4,5,6,7,8,9];
        $subDays  = [1,2,3,5,10];
    	for ($i=0; $i < 20 ; $i++) {
            
            $escort_id = $user_ids[array_rand($user_ids)];
            $coworker_id = $user_ids[array_rand($user_ids)];
            
            $record_exists = DB::table('coworkers')->where([
                                                           ['escort_id', '=', $escort_id ],
                                                           ['coworker_id', '=', $coworker_id ],
                                                        ])->first();

            if ($record_exists === null) {
                $data = array(
                    'escort_id'     => $escort_id,
                    'coworker_id'   => $coworker_id,
                    'created_at'    => Carbon::now()->subDays($subDays[array_rand($subDays)]),
                    'updated_at'    => Carbon::now()->subDays($subDays[array_rand($subDays)]),
                );  
                DB::table('coworkers')->insert($data);
            }

    	}
    	
    }

}
