<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class agentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\agent');
        for ($i=0; $i< 50 ; $i++) { 
            DB::table('agents')->insert([
              //  'NIC' =>$faker->randomNumber($nbDigits =9, $strict = false),
                'fName'=>$faker->firstName(),
                'lName'=>$faker->lastName(),
                'agAddress'=>$faker->address, 
                'agGender'=>$faker->randomElement($array = array ('M','F')),
                'agDOB'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31') 
                 ->format('Y-m-d'),
                'agContactNo' =>$faker->randomNumber($nbDigits = 9, $strict = false),
                'email'=>$faker->email,  
                'agBranch'=>$faker->word,            
                'accessList'=>$faker->city,    
                'isDeleted' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                ]);
        }
    }
}
