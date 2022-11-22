<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('ethnicities')->delete();
        $ethnicities = array(
	                    array('name' => "Asian"),
	                    array('name' => "Black"),
	                    array('name' => "Latina"),
	                    array('name' => "Oriental"),
	                    array('name' => "Indian"),
	                    array('name' => "Caucasian"),
	                    array('name' => "Mixed")
	                );   
	    DB::table('ethnicities')->insert($ethnicities); 
        
    }
}
