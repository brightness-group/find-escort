<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'Kempinski',
                'city_id' => '39454',
                'lat' => 26.848040,
                'long' => 33.987630,
            ],
            [
                'name' => 'Four Seasons',
                'city_id' => '39344',
                'lat' => 38.197632,
                'long' => -92.704727,
            ],
            [
                'name' => 'Mandarin Oriental',
                'city_id' => '39345',
                'lat' => 22.147640,
                'long' => -100.901962,
            ],
            [
                'name' => 'Fairmont',
                'city_id' => '39534',
                'lat' => 39.481140,
                'long' => -80.147621,
            ],
            [
                'name' => 'President Wilson',
                'city_id' => '39613',
                'lat' => 47.697010,
                'long' => -2.632730,
            ],
            [
                'name' => 'La Reserve',
                'city_id' => '39612',
                'lat' => 43.043210,
                'long' => 6.129520,
            ],
            [
                'name' => 'Hotel d’Angleterre',
                'city_id' => '39610',
                'lat' => 52.849710,
                'long' => -1.298310,
            ],
            [
                'name' => 'Ritz Carlton',
                'city_id' => '39398',
                'lat' => 18.462320,
                'long' => -66.228432,
            ],
            [
                'name' => 'Metropole',
                'city_id' => '39292',
                'lat' => -22.764760,
                'long' => -43.333800,
            ],
            [
                'name' => 'Beau Rivage',
                'city_id' => '39388',
                'lat' => -20.258420,
                'long' => 57.791590,
            ],
            [
                'name' => 'Intercontinental',
                'city_id' => '39569',
                'lat' => -17.815319,
                'long' => -63.091640,
            ],
            [
                'name' => 'Maison Hobo',
                'city_id' => '39472',
                'lat' => 31.009390,
                'long' => -95.892670,
            ],
            [
                'name' => 'Baroque Restaurant',
                'city_id' => '39553',
                'lat' => 43.922600,
                'long' => -0.183430,
            ],
            [
                'name' => 'Baroque Club',
                'city_id' => '39510',
                'lat' => 32.997190,
                'long' => -97.186630,
            ],
            [
                'name' => 'Roof Top 42',
                'city_id' => '39487',
                'lat' => 40.146900,
                'long' => -79.524000,
            ],
            [
                'name' => 'Java',
                'city_id' => '39457',
                'lat' => 36.819050,
                'long' => -79.236641,
            ],
            [
                'name' => 'VIP Oriental',
                'city_id' => '39432',
                'lat' => 19.375850,
                'long' => -97.619620,
            ],
            [
                'name' => 'MET Rooftop Lounge',
                'city_id' => '39525',
                'lat' => 47.241166,
                'long' => 10.738854,
            ],
            [
                'name' => 'The Leopard Room',
                'city_id' => '39541',
                'lat' => 27.815290,
                'long' => -97.521470,
            ],
            [
                'name' => 'Les Voiles',
                'city_id' => '39298',
                'lat' => 47.557790,
                'long' => 3.131320,
            ],
        ]);
    }
}
