<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_warehouses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->integer('qty_opening_stock');
            $table->integer('qty_import_warehouse');
            $table->integer('qty_export_warehouse');
            $table->integer('inventory_warehouse');
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
        Schema::dropIfExists('table_detail_warehouses');
    }
}
