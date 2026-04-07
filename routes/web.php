<?php
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

// This tells Laravel: Go to ChirpController and run the 'index' function
Route::get('/', [ChirpController::class, 'index']);
Route::post('/chirps', [ChirpController::class, 'store']);
