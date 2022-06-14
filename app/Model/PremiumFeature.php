<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumFeature extends Model
{
   protected $fillable = [
      'name', 'price', 'duration'
   ];
}
