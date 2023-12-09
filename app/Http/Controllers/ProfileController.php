<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function dashboard()
    {
        $data['title'] = "Dashboard";
        return \view('admin.dashboard')->with($data);

    }

    public function theme2()
    {
        return \view('admin.dashboard');

    }

    public function adminIndex()
    {
        return \view('admin.user.index');

    }

    public function radioChannels()
    {
        return \view('admin.user.index');

    }


    public function listen()
    {
            $filename = base_path('resources/audio/apa'  . '.mp3');

            // // $filename = 'https://stream.radiojar.com/59g2c0ffy2hvv';
            // $streamUrl = 'https://stream.radiojar.com/59g2c0ffy2hvv';

            $filesize = (int) File::size($filename);

            $file = File::get($filename);

            $response = Response::make($file, 200);
            $response->header('Content-Type', 'audio/mpeg');
            $response->header('Content-Length', $filename);
            $response->header('Accept-Ranges', 'bytes');
            $response->header('Content-Range', 'bytes 0-'.$filename.'/'.$filename);

            dd($response);
            return $response;



    }



}
