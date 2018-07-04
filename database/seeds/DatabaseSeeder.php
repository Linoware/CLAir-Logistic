<?php

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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);


        $this->call(CurrenciesTableSeeder::class);

        $this->call(CountriesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);


        $this->call(CityZoneTableSeeder::class);
        $this->call(CitiesZoneDetailTableSeeder::class);

        $this->call(CountryCentersTableSeeder::class);
        $this->call(CountryCentersCitiesZonesTableSeeder::class);








    }
}
