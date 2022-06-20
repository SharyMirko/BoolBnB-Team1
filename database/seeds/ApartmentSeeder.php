<?php

use Illuminate\Database\Seeder;
use App\Model\Apartment;
use App\Model\User;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class ApartmentSeeder extends Seeder
{

   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      $category = ['appartamenti', 'stanze', 'casali', 'ville'];
      $cities = [
         ['name' => 'Milano',
            'addresses' => [
               [
                  'name'         => 'Via verdi 23',
                  'latitude'     => '42.57',
                  'longitude'    => '50.32'
               ],
               [
                  'name'         => 'Corso Milano 18',
                  'latitude'     => '33.48',
                  'longitude'    => '74.50'
               ],
               [
                  'name'         => 'Corso Como 2',
                  'latitude'     => '33.48',
                  'longitude'    => '74.50'
               ],
               [
                  'name'         => 'Via salsa 21',
                  'latitude'     => '42.57',
                  'longitude'    => '50.32'
               ],
               [
                  'name'         => 'Viale Marco 5',
                  'latitude'     => '33.48',
                  'longitude'    => '74.50'
               ],
            ]
         ],
         // 'Venezia' => [
         //    ['Via verdi 23', '42.57', '50.32'],
         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Via verdi 23', '42.57', '50.32'],
         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Corso Como 2', '33.48', '74.50'],
         // ],
         // 'Roma' => [
         //    ['Via verdi 23', '42.57', '50.32'],
         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Via verdi 23', '42.57', '50.32'],
         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Corso Como 2', '33.48', '74.50'],
         // ],
         // 'Napoli' => [
         //    ['Via verdi 23' => [
         //          '42.57', '50.32'
         //       ]
         //    ],

         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Via verdi 23', '42.57', '50.32'],
         //    ['Corso Como 2', '33.48', '74.50'],
         //    ['Corso Como 2', '33.48', '74.50'],
         // ],
      ];


      for ($i = 0; $i < 20; $i++) {
         $title = $faker->words(rand(2, 4), true);

         $randCityVal = array_rand($cities);
         $randCity = $cities[$randCityVal];

         $baseLorPicUrl = 'https://picsum.photos/400/300?random=';
         $pow = pow(10, 6);
         Apartment::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $title,
            'thumb' => $baseLorPicUrl . rand(1, 500),
            'description' => $faker->words(rand(5, 20), true),
            'category' => $category[array_rand($category)],
            'rooms_n' => rand(1, 9),
            'beds_n' => rand(1, 4),
            'bathrooms_n' => rand(1, 2),
            'area' => rand(40, 200),
            'city'      => 0,
            'address'   => 0,
            'latitude'  => 0,
            'longitude' => 0,
            'visible' => rand(0, 1)
         ]);
      }
   }
}
