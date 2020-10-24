<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->integer('agId')->primary();
            $table->string('fName',50);
            $table->string('lname',50);
            $table->string('agAddress',100);
            $table->char('agGender',1);
            $table->date('agDob');
            $table->integer('agContactNo');
            $table->string('email',100);
            $table->string('agBranch',50);
            $table->string('accessList',35);
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
        Schema::dropIfExists('agents');
    }
}
