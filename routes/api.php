<?php

use App\Http\Controllers\APi\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('tracks', TrackController::class);
Route::apiResource('courses', TrackController::class);
