<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuhoachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuhoachs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_diary')->unsigned();
            $table->foreign('id_diary')->references('id')->on('farmer_diarys')->onDelete('cascade');
            $table->string('date_thuhoach');
            $table->string('sl_thuhoach');
            $table->string('gd_sd');
            $table->string('sl_banra');
            $table->string('giaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuhoachs');
    }
}
