<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToPolicyholderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->string('policyholder_email',50)->nullable()->unique()->after('lName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->dropColumn('policyholder_email');
        });
    }
}
