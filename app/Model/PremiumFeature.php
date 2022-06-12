<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumFeature extends Model
{
    protected $fillable = [
        'feature_name', 'feature_price', 'feature_duration'
    ];
}
