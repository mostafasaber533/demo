<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('tracks', App\Http\Controllers\TrackController::class);
Route::resource('courses', App\Http\Controllers\CourseController::class);


