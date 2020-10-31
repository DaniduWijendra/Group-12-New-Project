<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->integer('rId')->primary();
            $table->string('rDescription');
            $table->float('rCost')->unsigned();
            $table->date('rDate');
            $table->string('place');
            $table->string('vehicleNumber',10);
            $table->integer('adminId');
            $table->integer('agId');
            $table->boolean('isAccepted');
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
        Schema::dropIfExists('reports');
    }
}
