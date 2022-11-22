<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user_ids       = [1,2.3,4,5,6,7,8,9,10];
        $location_ids    = [1,2.3,4,5,6,7,8,9,10];
        $subDays        = [1,5,7,30,50];
        
        for ($i=0; $i < 100 ; $i++) {
            
            $user_id = $user_ids[array_rand($user_ids)];
            $location_id = $location_ids[array_rand($location_ids)];
            

            $record_exists = DB::table('user_locations')->where([
                                                                   ['location_id', '=', $location_id ],
                                                                   ['user_id', '=', $user_id ],
                                                                ])->first();

            if ($record_exists === null) {
                $data = array(
                    'user_id'       => $user_id,
                    'location_id'   => $location_id,
                    'created_at'    => Carbon::now()->subDays($subDays[array_rand($subDays)]),
                    'updated_at'    => Carbon::now()->subDays($subDays[array_rand($subDays)]),
                );
                DB::table('user_locations')->insert($data);
            }

        }

    }
}
