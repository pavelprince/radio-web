<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RadioChannelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AudioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('_welcomes');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::get('/theme', [ProfileController::class, 'theme'])->name('profile.edit');
//Route::get('/theme2', [ProfileController::class, 'theme2'])->name('profile.edit');
//Route::get('/theme3', [ProfileController::class, 'adminIndex'])->name('profile.edit');

Route::get('/radio-channel', [RadioChannelController::class, 'index'])->name('radio.channels');
Route::get('/radio-channel/create', [RadioChannelController::class, 'create'])->name('radio.channel.create');
Route::post('/radio-channel/store', [RadioChannelController::class, 'store'])->name('radio.channel.store');
Route::get('/radio-play', [RadioChannelController::class, 'play'])->name('radio.channel.play');

Route::get('/ingest', [RadioChannelController::class, 'ingest'])->name('radio.ingest');

require __DIR__.'/auth.php';

Route::get('/listen', [ProfileController::class, 'listen'])->name('listen');

Route::get('/stream-audio', [AudioController::class, 'streamAudio']);
