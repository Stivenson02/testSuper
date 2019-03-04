¿¿¿¿}9<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogLoteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_lote_products', function (Blueprint $table) {
            $table->increments('id');
            $table->date('pr_expiration_date');
            $table->integer('lote');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('users');
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
        Schema::dropIfExists('log_lote_products');
    }
}
