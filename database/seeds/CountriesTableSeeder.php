<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->truncate();

        //
        DB::table('countries')->insert([

          'country_name' => 'Cambdodia',
          'country_code' => '855',
          'country_short_code' => 'KH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('countries')->insert([

          'country_name' => 'Thailand',
          'country_code' => '66',
          'country_short_code' => 'TH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);


    }
}
