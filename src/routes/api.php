<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
    AuthController,
    UserController,
};



Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('users', UserController::class);
    
});  