<?php

use Illuminate\Database\Seeder;
use App\Model\View;
use App\Model\Apartment;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;


class ViewSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      View::create([
         'apartment_id'   => Apartment::inRandomOrder()->first()->id,
         'ip_address'     => $faker->ipv4()
      ]);
   }
}
