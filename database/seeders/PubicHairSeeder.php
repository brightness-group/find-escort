<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PubicHairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pubic_hairs')->delete();
        $pubic_hairs = array(
	                    array('name' => "Completely Shaved"),
	                    array('name' => "Mostly Shaved"),
	                    array('name' => "Trimmed"),
	                    array('name' => "Brazilian"),
	                    array('name' => "Natural")
	                );   
	    DB::table('pubic_hairs')->insert($pubic_hairs); 
    }
}