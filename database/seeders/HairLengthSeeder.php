<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HairLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hair_lengths')->delete();
        $hair_lengths = array(
	                    array('name' => "Short"),
	                    array('name' => "Medium"),
	                    array('name' => "Long"),
	                    array('name' => "Shoulder Length"),
	                    array('name' => "Bobbed"),
	                );   
	    DB::table('hair_lengths')->insert($hair_lengths); 
    }
}