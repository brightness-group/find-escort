<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HairColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hair_colors')->delete();
        $hair_colors = array(
                        array('name' => 'Blond'),
                        array('name' => 'Dark'),
                        array('name' => 'Dark Brown'),
                        array('name' => 'Light Brown'),
                        array('name' => 'Brown'),
                        array('name' => 'Black'),
                        array('name' => 'Red'),
                    );   
        DB::table('hair_colors')->insert($hair_colors); 
    }
}