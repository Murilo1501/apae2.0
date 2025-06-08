<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonUserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

//common
Route::get('common/user/{id}',[CommonUserController::class,'index']);
Route::post('common/user',[CommonUserController::class,'store']);

//auth
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);


