<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:Claim Paul Backend/database/migrations/2020_12_01_115104_remove_image.php
        Schema::table('shops', function (Blueprint $table) {
            //
        });
=======
        
            Schema::dropIfExists('users');
        
>>>>>>> 17722d838dd84cbd30d352242b9913ac422d53fa:Claim Paul Backend/database/migrations/2020_11_19_170757_add_coulmn2_to_users_table.php
    }
}
