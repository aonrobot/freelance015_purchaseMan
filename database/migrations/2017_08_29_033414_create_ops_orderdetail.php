<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsOrderdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ops_orderdetail', function (Blueprint $table) {
            $table->increments('OrderDetailID')->unique()->nullable();
            $table->string('OrderCode', 20)->nullable();
            $table->string('ProductCode', 20)->nullable();
            $table->integer('QTY');

            $table->foreign('OrderCode')->references('OrderCode')->on('ops_order');
            $table->foreign('ProductCode')->references('ProductCode')->on('mas_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ops_orderdetail');
    }
}
