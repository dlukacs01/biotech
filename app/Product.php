<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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

    public function getProductImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public function checkOverlap($current_campaign_id) {
        $today = Carbon::today();

        // van e ehhez a termékhez bekapcsolt kampány
        if($this->campaigns()) {

            // átmegyünk a termékhez kapcsolt kampányokon
            foreach($this->campaigns as $product_campaign) {

                // ha van a termékhez kapcsolt ÉS aktív kampány
                if($product_campaign->start_date <= $today && $product_campaign->end_date >= $today) {

                    // akkor meg kell nézni, hogy melyek a nem elérhető kampányok
                    $all_campaigns = Campaign::all();
                    foreach($all_campaigns as $i_campaign) {
                        if($i_campaign->start_date <= $today && $i_campaign->end_date >= $today) { // nem elérhető kampányok
                            if($current_campaign_id === $i_campaign->id) {
                                return true;
                            }
                        }
                    }

                } else {
                    return false;
                }

            }
        } else {
         return false;
        }
    }
}
