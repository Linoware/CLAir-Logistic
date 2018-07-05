<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreightDestinationProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('freight_destination_provinces')->truncate();

        //
        DB::table('freight_destination_provinces')->insert([

            'freight_id' => 1,
            'province_id' => 12,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_destination_provinces')->insert([

            'freight_id' => 2,
            'province_id' => 17,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_destination_provinces')->insert([

            'freight_id' => 2,
            'province_id' => 18,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_destination_provinces')->insert([

            'freight_id' => 3,
            'province_id' => 17,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freight_destination_provinces')->insert([

            'freight_id' => 4,
            'province_id' => 2,

            'description' => '',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
    }
}
