<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@example.ch',
                'name' => 'Admin',
                'password' => Hash::make('example'),
                'progress' => 7,
                'username' => 'admin',
                'city_id' => '39555',
                'gender' => 'female',
                'role'     => 'admin'
            ]
        ]);
    }
}
