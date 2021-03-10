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
}) -> name('index');
Route::resource('musics','MusicController')->only(['index','show','create']);
Route::resource('categories','CategoryController')->only(['index']);
Route::resource('users','UserController')->only(['index','create','show','store']);
Route::post('countlikes','MusicController@countlike')-> name('countlike');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
