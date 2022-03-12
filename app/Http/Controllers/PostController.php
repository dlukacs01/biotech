<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }
    public function create(){
        $campaigns = Campaign::all();
        return view('admin.posts.create',['campaigns'=>$campaigns]);
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'campaign_id'=>'integer',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        $campaign = Campaign::findOrFail($inputs['campaign_id']);

        $campaign->posts()->create($inputs);

        return redirect()->route('post.index');
    }
    public function publish(Post $post){
        $post->is_active = 1;
        $post->save();

        return back();
    }
}
