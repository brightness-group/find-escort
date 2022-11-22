<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
            	'name' => 'Small Lips',
            	'duration' => 1,
            	'price' => 120,
            	'description' => 'Publish your ad for 1 week. The option to "Pause" your ad is not available with this subscription.',
            ],
            [
            	'name' => 'Big Lips',
            	'duration' => 4,
            	'price' => 200,
            	'description' => 'Publish your ad for 4 weeks.The "pause" option is available.',
            ],
            [
            	'name' => 'Juicy Lips',
            	'duration' => 12,
            	'price' => 500,
            	'description' => 'Publish your ad for 12 weeks.The pause" option is available.',
            ]
        ]);
    }
}