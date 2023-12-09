<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadioChannelController extends Controller
{
    public function index()
    {
        $data['title'] = "Radio Channel";
        return \view('admin.user.radio-channels')->with($data);
    }

    public function create()
    {
        $data['title'] = "Create New Channel";
        return \view('admin.user.create-channel')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'radio_name' => 'required',
            'details' => 'required',
            'channel_url' => 'required',
        ]);
    }

    public function play()
    {
        $data['title'] = "Play a Channel";
        return \view('admin.user.play')->with($data);
    }
}
