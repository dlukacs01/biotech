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
        // $campaigns = Campaign::all();
        return view('admin.coupons.create');
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'coupon_image'=>'file',
            'body'=>'required'
        ]);

        if(request('coupon_image')){
            $inputs['coupon_image'] = request('coupon_image')->store('images');
        }

        // $campaign = Campaign::findOrFail($inputs['campaign_id']);

        // $campaign->coupons()->create($inputs);
        auth()->user()->coupons()->create($inputs);

        return redirect()->route('coupon.index');
    }
    public function edit(Coupon $coupon){
        $campaigns = Campaign::all();
        return view('admin.coupons.edit',[
            'coupon'=>$coupon,
            'campaigns'=>$campaigns
        ]);
    }
    public function update(Coupon $coupon){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'coupon_image'=>'file',
            'body'=>'required'
        ]);
        if(request('coupon_image')){
            $inputs['coupon_image'] = request('coupon_image')->store('images');
            $coupon->coupon_image = $inputs['coupon_image'];
        }

        $coupon->title = $inputs['title'];
        $coupon->body = $inputs['body'];

        $coupon->save();

        return redirect()->route('post.index');
    }
    public function publish(Coupon $coupon){
        $coupon->is_active = 1;
        $coupon->save();

        return back();
    }
    public function attach(Coupon $coupon){
        $coupon->campaigns()->attach(request('campaign'));
        return back();
    }
    public function detach(Coupon $coupon){
        $coupon->campaigns()->detach(request('campaign'));
        return back();
    }
}
