<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/katas','KataController@showAll');

Route::get('/katas/{kata}','KataController@getKata');
