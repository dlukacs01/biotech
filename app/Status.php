<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $guarded = [];

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }
}
