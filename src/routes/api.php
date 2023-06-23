<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    UserController,
    ClassroomController
};



Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('users', UserController::class);
    Route::apiResource('classrooms', ClassroomController::class);
    
});  