<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EyesColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eyes_colors')->insert([
            ['name' => 'Blue'],
            ['name' => 'Brown'],
            ['name' => 'Green'],
            ['name' => 'Grey'],
            ['name' => 'Hazel'],
           
        ]);
    }
}
