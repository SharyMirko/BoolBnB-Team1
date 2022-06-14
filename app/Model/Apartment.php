<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
   protected $fillable = [
      'title', 'thumb', 'description', 'category', 'user_id', 'rooms_n', 'beds_n', 'bathrooms_n', 'area', 'address', 'latitude', 'longitude', 'visible'
   ];

   public function services() {
      return $this->belongsToMany('App\Model\Service');
   }

   public function premiumFeatures() {
      return $this->belongsToMany('App\Model\PremiumFeature');
   }
}
