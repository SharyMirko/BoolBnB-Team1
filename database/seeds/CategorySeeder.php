<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $categories = ['appartamenti', 'stanze', 'casali', 'ville'];

      foreach ($categories as $category) {
         Category::create([
            'name' => $category
         ]);
      }
   }
}
