<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [EpisodeController::class, 'index']);
        Route::get('/{book}', [EpisodeController::class, 'show']);
        Route::get('/{book}/{episode}', [EpisodeController::class, 'listen']);
    });
});
