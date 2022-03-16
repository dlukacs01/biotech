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
            'product_image'=>'file',
            'body'=>'required'
        ]);

        if(request('product_image')){
            $inputs['product_image'] = request('product_image')->store('images');
        }

        // $campaign = Campaign::findOrFail($inputs['campaign_id']);

        // $campaign->products()->create($inputs);
        auth()->user()->products()->create($inputs);

        return redirect()->route('product.index');
    }
    public function edit(Product $product){
        $campaigns = Campaign::all();
        return view('admin.products.edit',[
            'product'=>$product,
            'campaigns'=>$campaigns
        ]);
    }
    public function update(Product $product){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'product_image'=>'file',
            'body'=>'required'
        ]);
        if(request('product_image')){
            $inputs['product_image'] = request('product_image')->store('images');
            $product->product_image = $inputs['product_image'];
        }

        $product->title = $inputs['title'];
        $product->body = $inputs['body'];

        $product->save();

        return redirect()->route('product.index');
    }
    public function publish(Product $product){
        $product->is_active = 1;
        $product->save();

        return back();
    }
    public function attach(Product $product){
        $product->campaigns()->attach(request('campaign'));
        return back();
    }
    public function detach(Product $product){
        $product->campaigns()->detach(request('campaign'));
        return back();
    }
}
