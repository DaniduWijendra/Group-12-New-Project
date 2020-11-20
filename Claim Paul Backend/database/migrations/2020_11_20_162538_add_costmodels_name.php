<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostmodelsName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costmodels', function (Blueprint $table) {
            $table->increments('costId');
            $table->string('damageType');
            $table->string('category');
            $table->float('cost');
            $table->primary('costId');
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
        Schema::table('costmodels', function (Blueprint $table) {
            Schema::dropIfExists('costmodels');
        });
    }
}
