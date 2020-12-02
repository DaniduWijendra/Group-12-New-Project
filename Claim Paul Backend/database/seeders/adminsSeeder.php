<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\admin');
        for ($i=0; $i< 50 ; $i++) { 
            DB::table('admins')->insert([
                'fName'=>$faker->firstName(),
                'lName'=>$faker->lastName(),
                'adminAddress'=>$faker->address, 
                'adminGender'=>$faker->randomElement($array = array ('M','F')),
                'adminDOB'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31') 
                 ->format('Y-m-d'),
                 'adminContactNo' =>$faker->randomNumber($nbDigits = 9, $strict = false),
                 'adminEmail' =>$faker->email,
                 'adminBranch'=>$faker->word,
                 'accessList'=>$faker->city,
                'isDeleted' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                ]);
        }
    }
}
