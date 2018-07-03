<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {

          $table->increments('city_id');
          $table->integer('province_id');
          $table->string('city_name');
          $table->string('city_code')->nullable();
          $table->string('city_short_code')->nullable();

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
        Schema::dropIfExists('cities');
    }
}
