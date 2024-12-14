<?php

use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
        Route::get("/profile", "show")->name("show");
    });
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [EpisodeController::class, 'index']);
        Route::get('/{book}', [EpisodeController::class, 'show']);
    });
});

Route::get('/book/{book}/{episode}', [EpisodeController::class, 'listen']);
