<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->integer('id_cate_invoice')->unsigned();
            $table->foreign('id_cate_invoice')->references('id')->on('invoice_caterogys');
            $table->string('status_invoice');
            $table->integer('discount_invoice');
            $table->string('total_price_invoice');
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
        Schema::dropIfExists('invoices');
    }
}
