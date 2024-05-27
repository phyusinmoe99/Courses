<?php

use App\Http\Controllers\AdminDashbordController;
use App\Http\Controllers\CoursesController;
use App\Http\Middleware\Admin;
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


Route::prefix('admin')->group(function(){
    Route::get('/dashbord' , [AdminDashbordController::class , 'index']);
    Route::get('/add' , [AdminDashbordController::class , 'add']);
    Route::post('/add' , [AdminDashbordController::class , 'create']);
    Route::get('/delete/{id}' , [AdminDashbordController::class , 'delete']);
    Route::get('/new-enrollment' , [AdminDashbordController::class , 'newEnroll']);
    Route::match(['get', 'post'], '/student-list', [AdminDashbordController::class , 'search']);

    
});


 

