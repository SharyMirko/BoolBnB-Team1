<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'apartment_id', 'user_id', 'email_guest', 'text_ms'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
