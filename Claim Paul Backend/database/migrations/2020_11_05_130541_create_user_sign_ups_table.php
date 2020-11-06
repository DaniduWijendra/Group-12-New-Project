<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSignUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sign_ups', function (Blueprint $table) {
            $table->integer('userId')->primary();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password',255);
            $table->string('role',20);
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
        Schema::dropIfExists('user_sign_ups');
    }
}
