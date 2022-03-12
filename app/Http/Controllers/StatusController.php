<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //
    public function index(){
        $statuses = Status::all();
        return view('admin.statuses.index',['statuses'=>$statuses]);
    }
    public function store() {
        request()->validate([
            'name'=>['required']
        ]);

        Status::create([
            'name'=>request('name')
        ]);

        return back();
    }
}
