<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class reportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\report');
        for ($i=0; $i< 50 ; $i++) { 
            DB::table('reports')->insert([
              //  'NIC' =>$faker->randomNumber($nbDigits =9, $strict = false),
                'rDescription'=>$faker->randomElement($array = array ('Bonnet Damage','Side Mirror Repair',
            'Windscreen build','buffer repair','Engine Tuneup')),
                'rCost'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
                'rDate'=>$faker->dateTimeBetween('1990-01-01', '2012-12-31') , 
                'place'=>$faker->city,
                'vehicleNumber'=>$faker->randomElement($array = array ('JW-4060','CBI-8202',
                'CBI-8210','CBI-8219','CBI-8220','CBI-8221','CBI-8226','CBI-8228','CBI-8290','CBI-8245','CBI-8216')),
                'adminId' =>$faker->numberBetween(0,20),
                'agId' =>$faker->numberBetween(0,20),
                'isAccepted' => 0,
                'isDeleted' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                ]);
        }
    }
}
