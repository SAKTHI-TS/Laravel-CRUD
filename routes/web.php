<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/',[userController::class,"index"]);
Route::post('/add/user',[userController::class,"adduser"]);
Route::delete('/del/user/{id}',[userController::class,"deluser"]);
Route::get('/fetch/user/{id}',[userController::class,"edituser"]);
Route::post('/edit/user/{id}',[userController::class,"newedituser"]);
