<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'controller' => UserController::class,
    'middleware' => ['auth:api']
], function () {
    Route::get('/user', 'getUser');
});
