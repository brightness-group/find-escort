<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$escort_ids = [4,5,6,7,8,9];
    	$user_ids = [1,2,3];
        $subDays = [1,5,7,30,50];
        
    	for ($i=0; $i < 100 ; $i++) { 
    		$data[] = array(
				'escort_id' => $escort_ids[array_rand($escort_ids)],
            	'user_id' 	=> $user_ids[array_rand($user_ids)],
            	'count' 	=> 1,
            	'created_at' => Carbon::now()->subDays($subDays[array_rand($subDays)]),
                'updated_at' => Carbon::now()->subDays($subDays[array_rand($subDays)]),
    		);	
    	}
    	
        DB::table('views')->insert($data);
    }
}
