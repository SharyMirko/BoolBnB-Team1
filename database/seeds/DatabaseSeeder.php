<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      $this->call(UserSeeder::class);
      $this->call(ApartmentSeeder::class);
      $this->call(CategorySeeder::class);
      $this->call(MessageSeeder::class);
      $this->call(PremiumFeatureSeeder::class);
      $this->call(ServiceSeeder::class);
      $this->call(ViewSeeder::class);
      $this->call(ApartmentPremiumFeatureSeeder::class);
      $this->call(ApartmentServiceSeeder::class);
   }
}
