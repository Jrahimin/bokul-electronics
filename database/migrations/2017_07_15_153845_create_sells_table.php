<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_item');
            $table->float('sell_price');
            $table->string('sell_type');
            $table->date('date');
            $table->string('serial_no')->nullable();
            $table->integer('item_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('instal_id')->unsigned()->nullable();
            $table->integer('cust_id')->unsigned()->nullable();
            $table->integer('stock_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('instal_id')->references('id')->on('installments');
            $table->foreign('cust_id')->references('id')->on('customers');
            $table->foreign('stock_id')->references('id')->on('stocks');
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
        Schema::dropIfExists('sells');
    }
}
