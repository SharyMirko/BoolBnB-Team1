<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title', 'thumb', 'description', 'category_id', 'rooms_n', 'beds_n', 'bathrooms_n', 'area', 'address', 'latitude', 'longitude', 'service_id', 'visible'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function statistics() {
        return $this->hasOne('App\Model\Statistic');
    }
}
