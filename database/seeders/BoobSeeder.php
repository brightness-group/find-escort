<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boobs')->delete();
        $boobs = array(
	                    array('name' => "Natural"),
	                    array('name' => "Silicon")
	                );   
	    DB::table('boobs')->insert($boobs); 
    }
}
