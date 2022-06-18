<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   protected $hidden = ['pivot'];
   protected $fillable = [
      'name'
   ];

   public function apartments() {
      return $this->belongsToMany('App\Model\Apartment');
  }
}
