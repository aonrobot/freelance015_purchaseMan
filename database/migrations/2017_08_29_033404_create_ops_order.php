<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ops_order', function (Blueprint $table) {
            $table->string('OrderCode', 20)->primary()->unique()->nullable();
            $table->string('CustomerCode', 20)->nullable();
            $table->date('OrderDate')->nullable();
            $table->integer('IsActive')->default('1');

            $table->foreign('CustomerCode')->references('CustomerCode')->on('mas_customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ops_order');
    }
}
