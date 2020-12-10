<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Page Controller
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/group/randomizer', [PageController::class, 'randomizer'])->name('group-randomizer');
Route::get('/kata/list', [PageController::class, 'kataList'])->name('kata-list');

//Auth::routes();

