<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();
        $clients = array(
	                    array('name' => "Men"),
	                    array('name' => "2+"),
	                    array('name' => "Couple"),
	                    array('name' => "Women"),
	                    array('name' => "Trans")
	                );   
	    DB::table('clients')->insert($clients); 
    }
}
