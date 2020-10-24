<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPolicyHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_policy_holders', function (Blueprint $table) {
            $table->integer('pId')->unsigned();
            $table->integer('adminId')->unsigned();
            $table->primary(array('pId','adminId'));
            $table->binary('isDeleted');
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
        Schema::dropIfExists('admin_policy_holders');
    }
}
