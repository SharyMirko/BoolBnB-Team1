<?php

use Illuminate\Database\Seeder;
use App\Model\Apartment;
use App\Model\User;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class ApartmentSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      for ($i = 0; $i < 20; $i++) {
         $title = $faker->words(rand(2, 4), true);
         $category = ['appartamenti', 'stanze', 'casali', 'ville'];
         $baseLorPicUrl = 'https://picsum.photos/400/300?random=';
         $pow = pow(10, 6);
         Apartment::create([
            'user_id'       => User::inRandomOrder()->first()->id,
            'title'         => $title,
            'thumb'         => $baseLorPicUrl . rand(1, 500),
            'description'   => $faker->words(rand(5, 20), true),
            'category'      => $category[array_rand($category)],
            'rooms_n'       => rand(1, 9),
            'beds_n'        => rand(1, 4),
            'bathrooms_n'   => rand(1, 2),
            'area'          => rand(40, 200),
            'price'         => rand(300, 2000)*100,
            'address'       => $faker->Address(),
            'latitude'      => rand(-90 * $pow, 90 * $pow) / $pow,
            'longitude'     => rand(-180 * $pow, 180 * $pow) / $pow,
            'visible'       => rand(0, 1)
         ]);
      }
   }
}
