<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerPhunthuocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phunthuocs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_diary')->unsigned();
            $table->foreign('id_diary')->references('id')->on('farmer_diarys')->onDelete('cascade');
            $table->string('ngayphun');
            $table->string('loaithuoc');
            $table->string('luongphun');
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
        Schema::dropIfExists('farmer_phunthuocs');
    }
}
