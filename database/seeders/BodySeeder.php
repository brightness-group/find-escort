<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodies')->delete();
        $bodies = array(
                        array('name' => 'Slim'),
                        array('name' => 'Fit'),
                        array('name' => 'Standard'),
                        array('name' => 'Curvy'),
                        array('name' => 'Chubby')
                    );   
        DB::table('bodies')->insert($bodies); 
    }
}