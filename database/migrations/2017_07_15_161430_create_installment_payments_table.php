<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('w_month');
            $table->float('amount');
            $table->date('date');
            $table->integer('instal_id')->unsigned();
            $table->foreign('instal_id')->references('id')->on('installments');
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
        Schema::dropIfExists('installment_payments');
    }
}
