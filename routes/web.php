<?php
use App\Models\Music;
use App\Models\Like;
use App\Models\Category;
use App\User;

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
    $query = Music::query();
    $query1= Like::query();
    $query2=Category::query();
    $md = Music::get();
    $categories = Category::get();
    return view('musics.index')->with([
        'categories' => $categories,
        'md' => $md,
    ]);
});
Route::resource('musics','MusicController')->only(['index','show','create']);

Route::resource('categories','CategoryController')->only(['index','show']);

Route::resource('users','UserController')->only(['index','create','show']);

Route::get('musics/like/{id}', 'MusicController@like')->name('music.like');
Route::get('musics/unlike/{id}', 'MusicController@unlike')->name('music.unlike');
// Route::resource('categories','CategoryController')->only(['index']);
// Route::resource('users','UserController')->only(['show']);
Auth::routes();

