<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('pro_id')->unsigned();
            $table->decimal('import_price', 15, 2)->unsigned();
            $table->integer('quatity')->unsigned();
            $table->decimal('total', 15, 2)->unsigned();
//            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
//            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade');
//            $table->timestamp('created_at')->default()->nullable();
//            $table->timestamp('updated_at')->default()->nullable();
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
        Schema::dropIfExists('import_invoices');
    }
}
