<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

//    public function products(){
//        return $this->hasMany(Product::class);
//    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function coupons(){
        return $this->hasMany(Coupon::class);
    }

    public function getCampaignImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
