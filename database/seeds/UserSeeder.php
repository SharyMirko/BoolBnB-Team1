<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      User::create([
         'first_name'      => 'Gigi',
         'last_name'       => 'Rossi',
         'email'           => 'gigirossi@gmail.com',
         'password'        => Hash::make('qwerty'),
         'date_of_birth'   => $faker->date(),
         'bio'             => $faker->words(rand(7,14), true)
      ]);

      for ($i = 0; $i < 3; $i++) {
         User::create([
            'first_name'      => $faker->firstName(),
            'last_name'       => $faker->lastName(),
            'email'           => $faker->email(),
            'password'        => Hash::make('qwerty'),
            'date_of_birth'   => $faker->date(),
            'bio'             => $faker->words(rand(7,14),true)
         ]);
      }
   }
}
