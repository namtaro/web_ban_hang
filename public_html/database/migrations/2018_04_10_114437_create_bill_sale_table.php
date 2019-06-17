<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sale_date');
            $table->string('total');
            $table->string('note');
            $table->integer('customer_id')->unsigned();
            $table->integer('status');
            $table->integer('personnel_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnel')->onDelete('cascade');
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
        Schema::drop('bill_sale');
    }
}
