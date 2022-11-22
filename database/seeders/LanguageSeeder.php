<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            ['name' => 'English'],
            ['name' => 'German'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'Chinesh'],
            ['name' => 'Russian'],
            ['name' => 'Korean'],
            ['name' => 'Italian'],
            ['name' => 'Arabic'],
            ['name' => 'Portuguese'],
        ]);
    }
}
