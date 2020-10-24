<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->integer('vId')->primary();
            $table->string('vehicleNumber',10)->unique();
            $table->string('policyId',100)->unique();
            $table->string('type',50);
            $table->string('model',50);
            $table->string('color',50);
            $table->string('year',5);
            $table->date('insuranceDate');
            $table->float('valuation');
            $table->string('insuranceType',50);
            $table->integer('policyPid')->unsigned();
           // $table->foreign('pId1')->references('pId')->on('policyholders');
            $table->integer('garageGid')->unsigned();
            //$table->foreign('gId1')->references('gId')->on('garages');
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
        Schema::dropIfExists('vehicles');
    }
}
