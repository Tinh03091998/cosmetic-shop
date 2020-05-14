<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->integer('pro_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->integer('discount_id')->unsigned()->nullable();
            $table->foreign('pro_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices');
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
        Schema::dropIfExists('invoice_details');
    }
}
