<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('tracks', App\Http\Controllers\TrackController::class);
Route::resource('courses', App\Http\Controllers\CourseController::class);


