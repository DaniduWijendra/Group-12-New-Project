<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->integer('gId');
            $table->string('gName',20);
            $table->string('gAddress',50);
            $table->integer('gContactNo');
            $table->string('gLocation',30);
            $table->timestamps();
            $table->primary('gId');
            $table->boolean('isDeleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garages');
    }
}
