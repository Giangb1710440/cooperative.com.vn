<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role_accesss')->onDelete('cascade');
            $table->integer('id_position')->unsigned();
            $table->foreign('id_position')->references('id')->on('positions')->onDelete('cascade');
            $table->string('name_user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address_user');
            $table->string('phone_user', 12);
            $table->string('sex_user');
            $table->string('birthday_user');
            $table->string('image_user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
