<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mas_products', function (Blueprint $table) {
            $table->string('ProductCode', 20)->unique()->nullable();
            $table->string('ProductName', 100);
            $table->string('ProductDescription', 100);
            $table->integer('IsActive')->default('1');

            $table->primary('ProductCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mas_products');
    }
}
