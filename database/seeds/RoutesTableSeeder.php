<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('routes')->truncate();

        //
        DB::table('routes')->insert([

            'origin_country_id' => 1,
            'destination_country_id' => 1,
            'currency_id' => 1,

            'description' => 'Cambodia ( KH-KH )',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
    }
}
