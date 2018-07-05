<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('currencies')->truncate();


        //
        DB::table('currencies')->insert([

            'currency_title' => 'US Dollar',
            'currency_code' => 'USD',
            'currency_sign' => '$',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00'
        ]);

        DB::table('currencies')->insert([

            'currency_title' => 'Khmer Reil',
            'currency_code' => 'KHR',
            'currency_sign' => '៛',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00'

        ]);
    }
}
