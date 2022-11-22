<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_addons')->insert([
            [
            	'user_id' => 1,
            	'addon_id' => 1,
            ],
            [
            	'user_id' => 1,
            	'addon_id' => 2,
            ],
            [
            	'user_id' => 1,
            	'addon_id' => 3,
            ],
            [
            	'user_id' => 1,
            	'addon_id' => 4,
            ]
        ]);
    }
}
