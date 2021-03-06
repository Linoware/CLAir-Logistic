<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesZonesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_zones_detail', function (Blueprint $table) {

            $table->integer('city_zone_id');
            $table->integer('city_id');

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
        Schema::dropIfExists('cities_zones_detail');
    }
}
