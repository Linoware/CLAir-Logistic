<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('freights')->truncate();

        //
        DB::table('freights')->insert([

            'route_id' => 1,
            'description' => 'Cambodia Domestic',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freights')->insert([

            'route_id' => 1,
            'description' => 'Cambodia Domestic',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freights')->insert([

            'route_id' => 1,
            'description' => 'Cambodia Domestic',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
        DB::table('freights')->insert([

            'route_id' => 1,
            'description' => 'Cambodia Domestic',

            'enable_status' => 1,
            'created_by' => 1,
            'created_at' => '2018-07-02 00:00:00',
            'updated_by' => 1,
            'updated_at' => '2018-07-02 00:00:00',
        ]);
    }
}
