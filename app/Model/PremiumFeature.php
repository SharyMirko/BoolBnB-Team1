<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumFeature extends Model
{
   protected $fillable = [
      'name', 'price', 'duration'
   ];

   public function apartments() {
      return $this->belongsToMany('App\Model\Apartment');
   }
}
