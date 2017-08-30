<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIDCardInMasCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mas_customer', function (Blueprint $table) {
            $table->bigInteger('IDCard')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mas_customer', function (Blueprint $table) {
            $table->integer('IDCard')->change();
        });
    }
}
