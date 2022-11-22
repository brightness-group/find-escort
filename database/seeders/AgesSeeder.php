<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->delete();
        $age_categories = array(
	                    array('name' => "18-21"),
	                    array('name' => "22-25"),
	                    array('name' => "26-29"),
	                    array('name' => "30-35"),
	                    array('name' => "35+")
	                );   
	    DB::table('ages')->insert($age_categories); 
    }
}
