<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addon_types')->insert([
            ['name' => 'Booster Smile'],
            ['name' => 'Regional Smile'],
            ['name' => 'National Smile'],
        ]);
    }
}