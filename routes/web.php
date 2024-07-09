<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//  return view('login');
// });

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/do-login',[UserController::class,'dologin'])->name('do.login');

Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');

Route::get('/register',[UserController::class,'register'])->name('register');

Route::POST('/registeringuser',[UserController::class,'registeruser'])->name('reg.user');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

