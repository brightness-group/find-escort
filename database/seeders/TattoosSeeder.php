<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TattoosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tattoos')->delete();
        $tattoos = array(
	                    array('name' => "Tattoos"),
	                    array('name' => "Piercings"),
	                    array('name' => "Both"),
	                    array('name' => "Neither")
	                );   
	    DB::table('tattoos')->insert($tattoos); 
    }
}