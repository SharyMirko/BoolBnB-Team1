<?php

use Illuminate\Database\Seeder;
use App\Model\Message;
use App\Model\Apartment;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;


class MessageSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');
      for ($i = 0; $i < 15; $i++) {
         Message::create([
            'apartment_id'   => Apartment::inRandomOrder()->first()->id,
            'email_sender'   => $faker->email(),
            'text_ms'        => $faker->paragraph(rand(1, 6))
         ]);
      }
   }
}
