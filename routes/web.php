<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/courses',[CoursesController::class,'index']); 
Route::get('/courses/detail/{id}',[CoursesController::class,'detail']); 
Route::post('/courses/detail/{id}',[CoursesController::class,'enroll']); 
Route::post('/courses/enroll/{id}',[CoursesController::class,'submit']); 
Route::get('/courses/enroll-dashbord',[CoursesController::class,'enrollDashbord']); 
//Route::post('/courses/enroll-dashbord',[CoursesController::class,'paymentValidator']); 
 

