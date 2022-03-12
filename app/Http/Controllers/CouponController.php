<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupons.index',['coupons'=>$coupons]);
    }
    public function create(){
        $campaigns = Campaign::all();
        return view('admin.coupons.create',['campaigns'=>$campaigns]);
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'campaign_id'=>'integer',
            'coupon_image'=>'file',
            'body'=>'required'
        ]);

        if(request('coupon_image')){
            $inputs['coupon_image'] = request('coupon_image')->store('images');
        }

        $campaign = Campaign::findOrFail($inputs['campaign_id']);

        $campaign->coupons()->create($inputs);

        return redirect()->route('coupon.index');
    }
}
