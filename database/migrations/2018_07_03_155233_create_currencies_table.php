<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {

            $table->increments('currency_id');
            $table->string('currency_title');
            $table->string('currency_code');
            $table->string('currency_sign')->nullable();


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
        Schema::dropIfExists('currencies');
    }
}
