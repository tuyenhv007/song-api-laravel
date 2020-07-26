<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('songs')->group(function () {
    Route::get('/', 'SongController@index')->name('song.all');
    Route::get('/{songId}', 'SongController@store')->name('song.store');
    Route::post('/', 'SongController@store')->name('song.store');
    Route::patch('/{songId}', 'SongController@update')->name('song.update');
    Route::delete('/{songId}', 'SongController@destroy')->name('song.destroy');
});
