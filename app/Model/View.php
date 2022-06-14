<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
   protected $fillable = [
      'apartment_id', 'ip_address'
   ];
}
