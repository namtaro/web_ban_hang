<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBillSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bill_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_sale_id')->unsigned();
            $table->integer('accessories_id')->unsigned();
            $table->string('amount');
            $table->string('total_money');
            $table->foreign('bill_sale_id')->references('id')->on('bill_sale')->onDelete('cascade');
            $table->foreign('accessories_id')->references('id')->on('accessories')->onDelete('cascade');
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
        Schema::drop('detail_bill_sale');
    }
}
