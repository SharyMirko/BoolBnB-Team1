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
      User::create([
         'first_name'      => 'gigi',
         'last_name'       => 'rossi',
         'email'           => 'gigirossi@gmail.com',
         'password'        => Hash::make('qwerty'),
         'date_of_birth'   => $faker->date(),
         'bio'             => $faker->words(rand(7,14), true)
      ]);

      for ($i = 0; $i < 3; $i++) {
         User::create([
            'first_name'      => $faker->name(),
            'last_name'       => $faker->name(),
            'email'           => $faker->email(),
            'password'        => Hash::make('qwerty'),
            'date_of_birth'   => $faker->date(),
            'bio'             => $faker->words(rand(7,14),true)
         ]);
      }
   }
}
