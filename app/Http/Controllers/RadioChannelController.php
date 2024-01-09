<?php

namespace App\Http\Controllers;

use App\Models\RadioChannel;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

    public function ingest(Request $request)
    {
        $radioURL = 'https://stream.radiojar.com/59g2c0ffy2hvv'; // Replace with your radio stream URL
//        $ingestURL = 'rtmp://a.rtmp.youtube.com/live2'; // Replace with your ingest URL
        $youtubeRTMPURL = 'rtmp://a.rtmp.youtube.com/live2/srk1-hx4h-agsq-m765-d49h';

        $ffmpegPath = 'C:\ffmpeg\bin\ffmpeg.exe';
        $command = "$ffmpegPath -i $radioURL -c copy -f flv $youtubeRTMPURL";
//        $command = "$ffmpegPath -i $radioURL -c:a aac -b:a 128k -ar 44100 -ac 2 -f flv $youtubeRTMPURL";

        $process = Process::fromShellCommandline($command);

        try {
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            return 'Radio stream successfully cast to ingest URL!';
        } catch (ProcessFailedException $exception) {
            return 'Failed to cast radio to ingest: ' . $exception->getMessage();
        }
    }
}
