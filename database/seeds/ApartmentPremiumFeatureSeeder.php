<?php

use Illuminate\Database\Seeder;
use App\Model\Apartment;
use App\Model\PremiumFeature;

class ApartmentPremiumFeatureSeeder extends Seeder
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
         $apartmentPremiumFeature = PremiumFeature::inRandomOrder()->limit(rand(0, 5))->get();

         $apartment->premiumFeatures()->attach($apartmentPremiumFeature->pluck('id')->all());
      }
   }
}
