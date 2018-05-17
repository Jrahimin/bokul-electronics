<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nickName');
            $table->string('fatherName');
            $table->string('presentAddress');
            $table->string('presentAddPhone');
            $table->string('homeWay');
            $table->string('OwnOrRent');
            $table->string('timeLiving');
            $table->string('familyMemberNo');
            $table->string('permanentAddress');
            $table->string('permanentAddPhone');
            $table->string('occupation');
            $table->string('monthlyIncome');
            $table->string('age');
            $table->string('maritalStatus');
            $table->string('product');
            $table->string('cashPrice');
            $table->string('InstallmentPrice');
            $table->string('downPayment');
            $table->string('monthlyInstallment');
            $table->string('firstPersonName');
            $table->string('firstPersonFatherName');
            $table->string('firstPersonPresent');
            $table->string('firstPersonPresentPhone');
            $table->string('firstPersonJob');
            $table->string('firstPersonJobPhone');
            $table->string('secondPersonName');
            $table->string('secondPersonFatherName');
            $table->string('secondPersonPresent');
            $table->string('secondPersonPresentPhone');
            $table->string('secondPersonJob');
            $table->string('secondPersonJobPhone');
            $table->integer('cust_id')->unsigned();
            $table->foreign('cust_id')->references('id')->on('customers');
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
        Schema::dropIfExists('customer_details');
    }
}
