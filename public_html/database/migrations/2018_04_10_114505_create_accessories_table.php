<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accessories_name');
            $table->string('origin');
            $table->string('amount');
            $table->string('input_unit_price');
            $table->string('sale_unit_price');
            $table->string('description');
            $table->string('status');
            $table->string('image');
            $table->integer('cate_accessories_id')->unsigned();
            $table->foreign('cate_accessories_id')->references('id')->on('cate_accessories')->onDelete('cascade');
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
        Schema::drop('accessories');
    }
}
