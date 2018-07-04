<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_zones', function (Blueprint $table) {

            $table->increments('city_zone_id');
            $table->integer('province_id');
            $table->string('city_zone_name');

            $table->boolean('enable_status');
            $table->integer('created_by');
            $table->datetime('created_at');
            $table->integer('updated_by');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_zones');
    }
}
