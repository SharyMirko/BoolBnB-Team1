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
         [
            'city' => 'Milano',
            'addresses' => [
               [
                  'name'         => 'Via Domodossola 16',
                  'latitude'     => '45.481446',
                  'longitude'    => '9.159714'
               ],
               [
                  'name'         => 'Via Enrico Sertoli 9',
                  'latitude'     => '45.518885',
                  'longitude'    => '9.149829'
               ],
               [
                  'name'         => 'Via Valtorta 21',
                  'latitude'     => '45.500572',
                  'longitude'    => '9.223390'
               ],
               [
                  'name'         => 'Via Medici 4',
                  'latitude'     => '45.461267',
                  'longitude'    => '9.181219'
               ],
               [
                  'name'         => 'Via Benaco 1',
                  'latitude'     => '45.445213',
                  'longitude'    => '9.211745'
               ],
            ]
         ],
         [
            'city' => 'Venezia',
            'addresses' => [
               [
                  'name'         => 'Calle de la Laca 2463',
                  'latitude'     => '45.430851',
                  'longitude'    => '12.324675'
               ],
               [
                  'name'         => 'Campiello Sant\'Agostin 2348',
                  'latitude'     => '45.438398',
                  'longitude'    => '12.328158'
               ],
               [
                  'name'         => 'Corte del Cazza 1340',
                  'latitude'     => '45.441025',
                  'longitude'    => '12.327094'
               ],
               [
                  'name'         => 'Calle del Vin 4647',
                  'latitude'     => '45.434535',
                  'longitude'    => '12.342648'
               ],
               [
                  'name'         => 'Calle Michelangelo 948',
                  'latitude'     => '45.425022',
                  'longitude'    => '12.338527'
               ],
            ]
         ],
         [
            'city' => 'Roma',
            'addresses' => [
               [
                  'name'         => 'Via Cristoforo Colombo 124',
                  'latitude'     => '41.866708',
                  'longitude'    => '12.497014'
               ],
               [
                  'name'         => 'Via dei Liguri 7',
                  'latitude'     => '41.897486',
                  'longitude'    => '12.516408'
               ],
               [
                  'name'         => 'Via Attilio Benigni 7',
                  'latitude'     => '41.931362',
                  'longitude'    => '12.560604'
               ],
               [
                  'name'         => 'Piazza della Trinità dei Monti 6',
                  'latitude'     => '41.906493',
                  'longitude'    => '12.483737'
               ],
               [
                  'name'         => 'Via dei Polacchi 23',
                  'latitude'     => '41.895249',
                  'longitude'    => '12.479231'
               ],
            ]
         ],
         [
            'city' => 'gdfagadf',
            'addresses' => [
               [
                  'name'         => 'Via Cristoforo Colombo 124',
                  'latitude'     => '41.866708',
                  'longitude'    => '12.497014'
               ],
               [
                  'name'         => 'Via dei Liguri 7',
                  'latitude'     => '41.897486',
                  'longitude'    => '12.516408'
               ],
               [
                  'name'         => 'Via Attilio Benigni 7',
                  'latitude'     => '41.931362',
                  'longitude'    => '12.560604'
               ],
               [
                  'name'         => 'Piazza della Trinità dei Monti 6',
                  'latitude'     => '41.906493',
                  'longitude'    => '12.483737'
               ],
               [
                  'name'         => 'Via dei Polacchi 23',
                  'latitude'     => '41.895249',
                  'longitude'    => '12.479231'
               ],
            ]
         ],
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
         $randCity = $cities[$randCityVal]; // prendo un array city

         $arrAddress = $randCity['addresses']; // definisco l'array addresses
         $randAddressVal = array_rand($arrAddress);
         $randAddress = $arrAddress[$randAddressVal]; // ho preso un array address random

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
            'city'      => $randCity['city'],
            'address'   => $randAddress['name'],
            'latitude'  => $randAddress['latitude'],
            'longitude' => $randAddress['longitude'],
            'visible' => rand(0, 1)
         ]);
      }
   }
}
