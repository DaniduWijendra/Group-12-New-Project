<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('payId')->primary();
            $table->date('paidDate');
            $table->date('renewDate');//should display date after 11 months
            $table->float('payInstallment');
            $table->float('claimRate');//show only when user didnt claim in previous year and if true give claim bonus
            $table->integer('vehicleVid')->unsigned();
            //$table->foreign('vId1')->references('vId')->on('vehicles');
            $table->boolean('isDeleted');
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
        Schema::dropIfExists('payments');
    }
}
