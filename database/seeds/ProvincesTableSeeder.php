<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provinces')->truncate();

        //
        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Banteay Meanchey',
          'province_code' => '',
          'province_short_code' => 'BMC',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Battambang',
          'province_code' => '',
          'province_short_code' => 'BTB',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kampong Cham',
          'province_code' => '',
          'province_short_code' => 'KPC',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kampong Chhnang',
          'province_code' => '',
          'province_short_code' => 'KCH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kampong Speu',
          'province_code' => '',
          'province_short_code' => 'KPS',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kampong Thom',
          'province_code' => '',
          'province_short_code' => 'KTH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kampot',
          'province_code' => '',
          'province_short_code' => 'KPT',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kandal',
          'province_code' => '',
          'province_short_code' => 'KDL',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Koh Kong',
          'province_code' => '',
          'province_short_code' => 'KHK',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kratié',
          'province_code' => '',
          'province_short_code' => 'KRT',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Mondulkiri',
          'province_code' => '',
          'province_short_code' => 'MDK',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Phnom Penh',
          'province_code' => '023',
          'province_short_code' => 'PNH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);


        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Preah Vihear',
          'province_code' => '',
          'province_short_code' => 'PHV',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Prey Veng',
          'province_code' => '',
          'province_short_code' => 'PRV',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Pursat',
          'province_code' => '',
          'province_short_code' => 'PST',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Ratanakiri',
          'province_code' => '',
          'province_short_code' => 'RTK',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Siem Reap',
          'province_code' => '063',
          'province_short_code' => 'SRP',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Sihanoukville',
          'province_code' => '',
          'province_short_code' => 'SHV',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Steung Treng',
          'province_code' => '',
          'province_short_code' => 'STT',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Svay Rieng',
          'province_code' => '',
          'province_short_code' => 'SVR',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Takéo',
          'province_code' => '',
          'province_short_code' => 'TKO',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Oddar Meanchey',
          'province_code' => '',
          'province_short_code' => 'OMC',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Kep',
          'province_code' => '',
          'province_short_code' => 'KEP',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Pailin',
          'province_code' => '',
          'province_short_code' => 'PLN',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

        DB::table('provinces')->insert([

          'country_id' => 1,
          'province_name' => 'Tboung Khmum',
          'province_code' => '',
          'province_short_code' => 'TKH',

          'enable_status' => 1,
          'created_by' => 1,
          'created_at' => '2018-07-02 00:00:00',
          'updated_by' => 1,
          'updated_at' => '2018-07-02 00:00:00',

        ]);

//         INSERT INTO `tb_provinces` (`province_ID`, `country_ID`, `province_Title`, `province_Code`, `province_ShortCode`, `enableStatus`, `createBy`, `createAt`, `updateBy`, `updateAt`) VALUES
// (1, 1, 'Banteay Meanchey', '', 'BMC', b'1', 1, NULL, NULL, NULL),
// (2, 1, 'Battambang', '', 'BTB', b'1', 1, NULL, NULL, NULL),
// (3, 1, 'Kampong Cham', '', 'KPC', b'1', 1, NULL, NULL, NULL),
// (4, 1, 'Kampong Chhnang', '', 'KCH', b'1', 1, NULL, NULL, NULL),
// (5, 1, 'Kampong Speu', '', 'KPS', b'1', 1, NULL, NULL, NULL),
// (6, 1, 'Kampong Thom', '', 'KTH', b'1', NULL, NULL, NULL, NULL),
// (7, 1, 'Kampot', '', 'KPT', b'1', NULL, NULL, NULL, NULL),
// (8, 1, 'Kandal', '', 'KDL', b'1', NULL, NULL, NULL, NULL),
// (9, 1, 'Koh Kong', '', 'KHK', b'1', NULL, NULL, NULL, NULL),
// (10, 1, 'Kratié', '', 'KRT', b'1', NULL, NULL, NULL, NULL),
// (11, 1, 'Mondulkiri', '', 'MDK', b'1', NULL, NULL, NULL, NULL),
// (12, 1, 'Phnom Penh', '023', 'PNH', b'1', NULL, NULL, NULL, NULL),
// (13, 1, 'Preah Vihear', '', 'PVH', b'1', NULL, NULL, NULL, NULL),
// (14, 1, 'Prey Veng', '', 'PRV', b'1', NULL, NULL, NULL, NULL),
// (15, 1, 'Pursat', '', 'PST', b'1', NULL, NULL, NULL, NULL),
// (16, 1, 'Ratanakiri', '', 'RTK', b'1', NULL, NULL, NULL, NULL),
// (17, 1, 'Siem Reap', '063', 'SRP', b'1', NULL, NULL, NULL, NULL),
// (18, 1, 'Sihanoukville', '', 'SHV', b'1', NULL, NULL, NULL, NULL),
// (19, 1, 'Steung Treng', '', 'STT', b'1', NULL, NULL, NULL, NULL),
// (20, 1, 'Svay Rieng', '', 'SVR', b'1', NULL, NULL, NULL, NULL),
// (21, 1, 'Takéo', '', 'TKO', b'1', NULL, NULL, NULL, NULL),
// (22, 1, 'Oddar Meanchey', '', 'OMC', b'1', NULL, NULL, NULL, NULL),
// (23, 1, 'Kep', '', 'KEP', b'1', NULL, NULL, NULL, NULL),
// (24, 1, 'Pailin', '', 'PLN', b'1', NULL, NULL, NULL, NULL),
// (25, 1, 'Tboung Khmum', '', 'TKH', b'1', NULL, NULL, NULL, NULL);
    }
}
