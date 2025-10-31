<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getuser' , [UserController::class,'showUser'])->name('getuser');
Route::get('/get/single/user/{id}' , [UserController::class,'showSingleUser'])->name('get.single.user');;
Route::get('/users/create' , [UserController::class,'create'])->name('users.create');;
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

Route::get('/get/single/edit/{id}' , [UserController::class,'edit'])->name('get.single.edit');;
Route::patch('/get/single/edit/{id}' , [UserController::class,'update'])->name('get.single.edit');;
