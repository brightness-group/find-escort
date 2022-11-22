<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CupSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('cup_sizes')->delete();	
        $cupsizes = array(
        				array('name' => 'A'),
        				array('name' => 'B'),
        				array('name' => 'C'),
        				array('name' => 'D'),
        				array('name' => 'DD'),
        				array('name' => 'F'),
        				array('name' => 'FF'),
        				array('name' => 'G'),
        			);
        DB::table('cup_sizes')->insert($cupsizes);
    }
}
