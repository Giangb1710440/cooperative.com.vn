<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerDetailGdstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_gdsts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_diary')->unsigned();
            $table->foreign('id_diary')->references('id')->on('farmer_diarys')->onDelete('cascade');
            $table->integer('id_gdst')->unsigned();
            $table->foreign('id_gdst')->references('id')->on('gdsts')->onDelete('cascade');
            $table->string('time_st');
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
        Schema::dropIfExists('farmer_detail_gdsts');
    }
}
