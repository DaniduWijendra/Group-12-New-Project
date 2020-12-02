<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\shop');
        for ($i=0; $i< 50 ; $i++) { 
            DB::table('shops')->insert([
              //  'NIC' =>$faker->randomNumber($nbDigits =9, $strict = false),
                'sName'=>$faker->firstName(),
                'sAddress'=>$faker->address, 
                'sContact' =>$faker->randomNumber($nbDigits = 9, $strict = false),          
                'sLocation'=>$faker->city,    
                'isDeleted' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                ]);
        }
    }
}
