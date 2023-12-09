<?php

namespace App\Http\Controllers;

use App\Models\RadioChannel;
use Illuminate\Http\Request;

class RadioChannelController extends Controller
{
    public function index()
    {
        $data['title'] = "Radio Channel";
        $data['channels'] = RadioChannel::all();
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
            'details' => 'required|unique:radio_channels,name',
            'channel_url' => 'required',
        ]);

        $new_channel = new RadioChannel();
        $new_channel->name = $request->radio_name;
        $new_channel->details = $request->details;
        $new_channel->link = $request->channel_url;
        $new_channel->save();

        return back();
    }

    public function play()
    {
        $data['title'] = "Play a Channel";
        $data['channels'] = RadioChannel::all();
        return \view('admin.user.play')->with($data);
    }
}
