<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
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

    public function getCouponImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

//    public function canWePublish($date) {
//        $last_day = date('t', strtotime($date)); // t - The number of days in the given month
//
//        $allowed_days = array("01", "02", "03", $last_day, $last_day - 1, $last_day - 2);
//
//        $current_day = date('d', strtotime($date)); // d - The day of the month (from 01 to 31)
//
//        if(in_array($current_day, $allowed_days)) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function canWePublish() {
        $last_day = date('t'); // t - The number of days in the given month

        $allowed_days = array("01", "02", "03", $last_day, $last_day - 1, $last_day - 2);

        $current_day = date('d'); // d - The day of the month (from 01 to 31)

        if(in_array($current_day, $allowed_days)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkOverlap($current_campaign_id) {
        $today = Carbon::today();

        // van e ehhez a termékhez bekapcsolt kampány
        if($this->campaigns()) {

            // átmegyünk a termékhez kapcsolt kampányokon
            foreach($this->campaigns as $coupon_campaign) {

                // ha van a termékhez kapcsolt ÉS aktív kampány
                if($coupon_campaign->start_date <= $today && $coupon_campaign->end_date >= $today) {

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
