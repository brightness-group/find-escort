<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('smokes')->delete();
        $smokes = array(
	                    array('name' => "Yes"),
	                    array('name' => "No"),
	                    array('name' => "Occasionally")
	                );   
	    DB::table('smokes')->insert($smokes); 
    }
}