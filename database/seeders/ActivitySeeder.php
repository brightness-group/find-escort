<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->delete();
        $activities = array(
	                    array('name' => "Escort"),
	                    array('name' => "Masseuse"),
	                    array('name' => "BDSM"),
	                    array('name' => "Video chat"),
	                );   
	    DB::table('activities')->insert($activities); 
    }
}