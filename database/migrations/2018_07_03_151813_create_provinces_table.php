<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {

          $table->increments('province_id');
          $table->integer('country_id')->unsigned();


          $table->string('province_name');
          $table->string('province_code')->nullable();
          $table->string('province_short_code')->nullable();

          $table->boolean('enable_status');
          $table->integer('created_by');
          $table->datetime('created_at');
          $table->integer('updated_by');
          $table->datetime('updated_at');

//          $table->foreign('country_id')->references('country_id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
