<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::get('/genre', 'GenreController@index')->name('genre.index');
    Route::get('/genre/{genre}', 'GenreController@show')->name('genre.show');
    Route::get('/tmdb/{tmdbId}', 'TmdbController@show')->name('tmdb.show');
});
