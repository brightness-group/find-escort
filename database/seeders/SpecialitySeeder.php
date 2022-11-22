<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            ['name' => '15 min quickie'],
            ['name' => '69'],
            ['name' => 'Anal'],
            ['name' => 'Anal (discretion)'],
            ['name' => 'Anal Play'],
            ['name' => 'Ball busting'],
            ['name' => 'Bareback'],
            ['name' => 'BDSM'],
            ['name' => 'BDSM Giving'],
            ['name' => 'BDSM Receiving'],
            ['name' => 'Being filmed'],
            ['name' => 'Blowjob'],
            ['name' => 'Blowjob without condom'],
            ['name' => 'Couples'],
            ['name' => 'Cumshot on Body'],
            ['name' => 'Cumshot on Face'],
            ['name' => 'Cumshot in Mouth'],
            ['name' => 'Deep Throat'],
            ['name' => 'Dinner date'],
            ['name' => 'Disabled welcome'],
            ['name' => 'Double penetration'],
            ['name' => 'Erotic Massage'],
            ['name' => 'Face sitting'],
            ['name' => 'Female ejaculation'],
            ['name' => 'Fetish'],
            ['name' => 'Fisting Giving'],
            ['name' => 'Fisting Receiving'],
            ['name' => 'French kiss'],
            ['name' => 'Gang bang'],
            ['name' => 'Masturbation'],
            ['name' => 'Porn Star'],
            ['name' => 'Role Play'],
            ['name' => 'Sex Toys'],
            ['name' => 'Soft Domination'],
            ['name' => 'Hard Domination'],
            ['name' => 'Striptease'],
            ['name' => 'Swallow'],
            ['name' => 'Tantric'],
            ['name' => 'Threesome'],
            ['name' => 'Tits fuck'],
            ['name' => 'VIP Service'],
            ['name' => 'Uniform'],
            ['name' => 'Webcam'],
        ]);
    }
}