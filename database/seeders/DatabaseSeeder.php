<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
	        SpecialitySeeder::class,
	        PlanSeeder::class,
	        AddonTypeSeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            BodySeeder::class,
            EyesColorSeeder::class,
	        HairColorSeeder::class,
            AddonSeeder::class,
	        //UsersSeeder::class,
            LocationSeeder::class,
            //UserLocationSeeder::class,
            //ViewsSeeder::class,
            //AnalyticsSeeder::class,
            //ReviewsSeeder::class,
            //CoworkerSeeder::class,
            EthnicitySeeder::class,
            CupSizeSeeder::class,
            BoobSeeder::class,
            HairLengthSeeder::class,
            PubicHairSeeder::class,
            ClientSeeder::class,
            SmokeSeeder::class,
            TattoosSeeder::class,
            AgesSeeder::class,
            ActivitySeeder::class,
	    ]);
    }
}
