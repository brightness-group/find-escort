<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addons')->insert([
            [
            	'name' => 'Lips Gloss',
            	'addon_type_id' => 1,
            	'duration' => 1,
            	'price' => 200,
            ],
            [
            	'name' => 'Lip Stick',
            	'addon_type_id' => 1,
            	'duration' => 4,
            	'price' => 800,
            ],
            [
            	'name' => 'Botox Injection',
            	'addon_type_id' => 1,
            	'duration' => 12,
            	'price' => 2000,
            ],


            [
            	'name' => 'Lips Gloss',
            	'addon_type_id' => 2,
            	'duration' => 1,
            	'price' => 50,
            ],
            [
            	'name' => 'Lip Stick',
            	'addon_type_id' => 2,
            	'duration' => 4,
            	'price' => 150,
            ],
            [
            	'name' => 'Botox Injection',
            	'addon_type_id' => 2,
            	'duration' => 12,
            	'price' => 400,
            ],



            [
            	'name' => 'Lips Gloss',
            	'addon_type_id' => 3,
            	'duration' => 1,
            	'price' => 150,
            ],
            [
            	'name' => 'Lip Stick',
            	'addon_type_id' => 3,
            	'duration' => 4,
            	'price' => 450,
            ],
            [
            	'name' => 'Botox Injection',
            	'addon_type_id' => 3,
            	'duration' => 12,
            	'price' => 1200,
            ],
        ]);
    }
}
