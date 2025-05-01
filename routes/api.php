<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonUserController;

//common
Route::get('common/user',[CommonUserController::class,'index']);
Route::post('common/user',[CommonUserController::class,'store']);
