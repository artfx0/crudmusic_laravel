<?php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

// This creates all routes for our CRUD system
Route::resource('music', MusicController::class);

// Make the homepage redirect to music page
Route::get('/', function () {
    return redirect()->route('music.index');
});