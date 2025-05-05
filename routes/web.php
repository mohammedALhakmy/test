<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('empty',function(){
    return "empty";
});

// 1
// Route::get('/greeting',[AdminController::class,'index']);


Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/greeting','index')->name('greeting.index');
    Route::get('/greeting/create','create')->name('greeting.create');
    Route::get('/greeting/{admin}','show');
    Route::get('/greeting/{admin}/edit','edit')->name('greeting.edit');
    Route::post('/greeting','store')->name('greeting.store');
    Route::post('/greeting/{admin}','update')->name('greeting.update');
    Route::delete('/greeting/{admin}','destroy');
});

// Route::get('/greeting',[AdminController::class,'create']);
// Route::get('/greeting',[AdminController::class,'shoe']);
// Route::get('/greeting',[AdminController::class,'store']);
// Route::get('/greeting',[AdminController::class,'destory']);
// Route::get('/greeting',[AdminController::class,'update']);
