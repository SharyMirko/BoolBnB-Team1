<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $fillable = [
      'apartment_id', 'email_sender', 'text_ms'
   ];

   public function user()
   {
      return $this->belongsTo('App\Model\User');
   }
}
