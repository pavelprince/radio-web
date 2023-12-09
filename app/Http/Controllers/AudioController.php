<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AudioController extends Controller
{
    public function streamAudio()
    {
        $url = 'https://stream.radiojar.com/59g2c0ffy2hvv';

        // Fetch the audio stream from the URL
        $response = Http::get($url);

        // Set the appropriate headers for audio streaming
        $headers = [
            'Content-Type' => 'audio/mpeg',
            'Content-Disposition' => 'inline;filename="stream.mp3"',
            'Cache-Control' => 'no-cache',
            'Content-Transfer-Encoding' => 'binary',
            'Connection' => 'keep-alive',
        ];

        // Use StreamedResponse to stream the audio content
        return new StreamedResponse(
            function () use ($response) {
                echo $response->body();
            },
            200,
            $headers
        );
    }
}
