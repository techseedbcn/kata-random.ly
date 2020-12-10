<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/katas', [KataController::class, 'index'])->name('katas.index');
Route::get('/katas/{kata}', [KataController::class, 'show'])->name('kata.show');

