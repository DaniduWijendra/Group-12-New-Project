<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\policyHolder');
        for ($i=0; $i< 50 ; $i++) { 
            DB::table('policy_holders')->insert([
                'NIC' =>$faker->randomNumber($nbDigits =9, $strict = false),
                'fName'=>$faker->firstName(),
                'lName'=>$faker->lastName(),
                'pAddress'=>$faker->address, 
                'pGender'=>$faker->randomElement($array = array ('M','F')),
                'pDOB'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31') 
                 ->format('Y-m-d'),
                 'pContactNo' =>$faker->randomNumber($nbDigits = 9, $strict = false),
                 'accessList'=>$faker->city,
                'isDeleted' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                ]);
        }
    }
}
