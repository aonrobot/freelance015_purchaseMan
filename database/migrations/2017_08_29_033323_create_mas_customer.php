<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mas_customer', function (Blueprint $table) {
            $table->string('CustomerCode', 20)->unique()->nullable();
            $table->string('FirstName', 100);
            $table->string('LastName', 100);
            $table->integer('IDCard');
            $table->string('Tel', 20);
            $table->integer('IsActive')->default('1');

            $table->primary('CustomerCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mas_customer');
    }
}
