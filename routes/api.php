<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommonUserController;

//common
Route::middleware(['auth:sanctum', RoleMiddleware::class.':comon'])->group(function () {
    Route::get('common/user/{id}',[CommonUserController::class,'index']);
});
Route::post('common/user',[CommonUserController::class,'store']);

//admin
Route::middleware(['auth:sanctum', RoleMiddleware::class.':admin'])->group(function () {
    Route::post('admin/user',[AdminUserController::class,'store']);
    Route::get('admin/user/{id}',[AdminUserController::class,'index']);
});


//auth
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);


