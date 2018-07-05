<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_charges', function (Blueprint $table) {

            $table->increments('freight_charge_id');
            $table->integer('freight_id');
            $table->string('freight_charge_title');

            $table->float('min_weight');
            $table->float('max_weight');
            $table->float('charge_price');

            $table->string('description');

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
        Schema::dropIfExists('freight_charges');
    }
}
