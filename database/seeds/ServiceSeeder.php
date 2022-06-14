<?php

use Illuminate\Database\Seeder;
use App\Model\Service;

class ServiceSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $services = ['WiFi', 'Sauna', 'Piscina', 'Posto auto', 'Portineria'];

      foreach ($services as $service) {
         Service::create([
            'name' => $service
         ]);
      }
   }
}
