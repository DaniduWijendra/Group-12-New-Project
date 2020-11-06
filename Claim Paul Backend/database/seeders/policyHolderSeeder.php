<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class policyHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PolicyHolder::class, 50)->create();
    }
}
