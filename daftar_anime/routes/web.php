<?php

use Illuminate\Support\Facades\Route;


//route resource



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
Route::resource('/anime', \App\Http\Controllers\AnimeController::class);
Route::resource('/genre', \App\Http\Controllers\GenreController::class);

//Route search





