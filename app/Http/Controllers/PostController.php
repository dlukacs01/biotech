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
        // $campaigns = Campaign::all();
        return view('admin.posts.create');
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        // $campaign = Campaign::findOrFail($inputs['campaign_id']);

        // $campaign->posts()->create($inputs);
        auth()->user()->posts()->create($inputs);

        return redirect()->route('post.index');
    }
    public function edit(Post $post){
        $campaigns = Campaign::all();
        return view('admin.posts.edit',[
            'post'=>$post,
            'campaigns'=>$campaigns
        ]);
    }
    public function update(Post $post){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->save();

        return redirect()->route('post.index');
    }
    public function publish(Post $post){
        $post->is_active = 1;
        $post->save();

        return back();
    }
    public function attach(Post $post){
        $post->campaigns()->attach(request('campaign'));
        return back();
    }
    public function detach(Post $post){
        $post->campaigns()->detach(request('campaign'));
        return back();
    }
}
