<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('musics','MusicController')->only(['index','show','create']);

Route::resource('categories','CategoryController')->only(['index','show']);

Route::resource('users','UserController')->only(['index','create','show']);

Route::get('musics/like/{id}', 'MusicController@like')->name('music.like');
Route::get('musics/unlike/{id}', 'MusicController@unlike')->name('music.unlike');
