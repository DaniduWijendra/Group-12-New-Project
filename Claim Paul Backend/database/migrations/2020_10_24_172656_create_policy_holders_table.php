<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_holders', function (Blueprint $table) {
            $table->integer('pId')->primary();
            $table->string('NIC',12)->unique();
            $table->string('fName',50);
            $table->string('lName',50);
            $table->string('pAddress',50);
            $table->char('pGender',1);
            $table->date('pDOB');
            $table->integer('pContactNo');
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
        Schema::dropIfExists('policy_holders');
    }
}
