<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $guarded = [];

//    public function campaign(){
//        return $this->belongsTo(Campaign::class);
//    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaigns(){
        return $this->belongsToMany(Campaign::class);
    }

    public function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public function isWeekend() {
        return (date('N') >= 6);
    }
}
