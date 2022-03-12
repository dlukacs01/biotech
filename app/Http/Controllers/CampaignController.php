<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Status;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //
    public function index(){
        $campaigns = Campaign::all();
        return view('admin.campaigns.index',['campaigns'=>$campaigns]);
    }
    public function create(){
        $statuses = Status::all();
        return view('admin.campaigns.create',['statuses'=>$statuses]);
    }
    public function store(){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'campaign_image'=>'file',
            'body'=>'required',
            'status_id'=>'integer',
            'start_date'=>'required|date',
            'end_date'=>'required|date'
        ]);

        if(request('campaign_image')){
            $inputs['campaign_image'] = request('campaign_image')->store('images');
        }

        auth()->user()->campaigns()->create($inputs);

        return redirect()->route('campaign.index');
    }
}
