<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_centers', function (Blueprint $table) {

            $table->increments('center_id');
            $table->integer('country_id');
            $table->integer('province_id');
            $table->boolean('is_province_default');

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
        Schema::dropIfExists('country_centers');
    }
}
