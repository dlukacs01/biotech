<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //

    protected $guarded = [];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function getCouponImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
