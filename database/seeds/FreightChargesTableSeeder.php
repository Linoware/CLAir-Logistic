<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreightChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('freight_charges')->truncate();

        //
        DB::table('freight_charges')->insert([

            'freight_id' => 1,
            'freight_charge_title' => 'minimum weight',

            'min_weight' => 0,
            'max_weight' => 3,
            'charge_price' => 1.0,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_charges')->insert([

            'freight_id' => 1,
            'freight_charge_title' => 'Level C weight',

            'min_weight' => 3,
            'max_weight' => 5,
            'charge_price' => 1.2,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_charges')->insert([

            'freight_id' => 1,
            'freight_charge_title' => 'Level B weight',

            'min_weight' => 5,
            'max_weight' => 10,
            'charge_price' => 2.0,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_charges')->insert([

            'freight_id' => 1,
            'freight_charge_title' => 'Level A weight',

            'min_weight' => 10,
            'max_weight' => 25,
            'charge_price' => 3.5,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_charges')->insert([

            'freight_id' => 1,
            'freight_charge_title' => 'Maximum weight',

            'min_weight' => 25,
            'max_weight' => 50,
            'charge_price' => 7.0,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
    }
}
