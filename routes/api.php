<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KataController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/katas', [KataController::class, 'getKatas']);
Route::get('/katas/{kata}',[KataController::class, 'getKata']);

Route::get('/random-kata', [KataController::class, 'getRandomKata']);
