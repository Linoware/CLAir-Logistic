<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {

          $table->increments('area_id');
          $table->integer('city_id');
          $table->string('area_name');
          $table->string('area_zipcode')->nullable();
          $table->string('area_short_code')->nullable();

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
        Schema::dropIfExists('areas');
    }
}
