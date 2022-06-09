<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'apartment_id', 'views'
    ];

    public function apartments() {
        return $this->belongsTo('App\Model\Apartment');
    }
}
