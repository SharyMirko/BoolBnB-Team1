<?php

use Illuminate\Database\Seeder;
use App\Model\Apartment;
use App\Model\Service;

class ApartmentServiceSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $apartments = Apartment::all();

      foreach ($apartments as $apartment) {
         $apartmentServices = Service::inRandomOrder()->limit(rand(0, 5))->get();

         $apartment->services()->attach($apartmentServices->pluck('id')->all());
      }
   }
}
