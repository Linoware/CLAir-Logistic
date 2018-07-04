<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryCentersCitiesZonesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_centers_cities_zones_details', function (Blueprint $table) {

            $table->integer('center_id');
            $table->integer('city_zone_id');

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
        Schema::dropIfExists('country_centers_cities_zones_details');
    }
}
