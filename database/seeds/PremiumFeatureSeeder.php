<?php

use Illuminate\Database\Seeder;
use App\Model\PremiumFeature;

class PremiumFeatureSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $premiumFeatures = [
         [
            'name'     => 'Promo 24',
            'price'    => 299,
            'duration' => 24
         ],
         [
            'name'     => 'Promo 72',
            'price'    => 599,
            'duration' => 72
         ],
         [
            'name'     => 'Promo 144',
            'price'    => 999,
            'duration' => 144
         ],
      ];

      foreach ($premiumFeatures as $feature) {
         PremiumFeature::create([
            'name'     => $feature['name'],
            'price'    => $feature['price'],
            'duration' => $feature['duration'],
         ]);
      }
   }
}
