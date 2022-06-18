<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
   protected $fillable = [
      'title', 'thumb', 'description', 'category', 'user_id', 'rooms_n', 'beds_n', 'bathrooms_n', 'area', 'price', 'address', 'latitude', 'longitude', 'visible'
   ];

   public function user()
   {
      return $this->belongsTo('App\Model\User');
   }
   public function views()
   {
      return $this->hasMany('App\Model\View');
   }

   public function messages()
   {
      return $this->hasMany('App\Model\Message');
   }

   public function services() {
      return $this->belongsToMany('App\Model\Service');
   }

   public function premiumFeatures() {
      return $this->belongsToMany('App\Model\PremiumFeature');
   }
}
