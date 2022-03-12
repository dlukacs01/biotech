<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        $products = Product::all();
        return view('admin.products.index',['products'=>$products]);
    }
    public function create(){
        $campaigns = Campaign::all();
        return view('admin.products.create',['campaigns'=>$campaigns]);
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'campaign_id'=>'integer',
            'product_image'=>'file',
            'body'=>'required'
        ]);

        if(request('product_image')){
            $inputs['product_image'] = request('product_image')->store('images');
        }

        $campaign = Campaign::findOrFail($inputs['campaign_id']);

        $campaign->products()->create($inputs);

        return redirect()->route('product.index');
    }
    public function publish(Product $product){
        $product->is_active = 1;
        $product->save();

        return back();
    }
}
