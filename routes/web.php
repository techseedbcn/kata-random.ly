<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Page Controller
Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/group/randomizer', [App\Http\Controllers\PageController::class, 'randomizer'])->name('group-randomizer');
Route::get('/kata/list', [App\Http\Controllers\PageController::class, 'kataList'])->name('kata-list');

//Auth::routes();

