<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_cate_product')->unsigned();
            $table->foreign('id_cate_product')->references('id')->on('product_caterogys')->onDelete('cascade');
            $table->integer('id_unit')->unsigned();
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
            $table->string('name_product');
            $table->string('description_product')->nullable();
            $table->string('status_product');
            $table->string('image_product')->nullable();
            $table->bigInteger('cost_price_product');
            $table->bigInteger('sale_price_product');
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
        Schema::dropIfExists('products');
    }
}
