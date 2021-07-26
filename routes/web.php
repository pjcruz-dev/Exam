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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/favorites', 'ContactsController@favorites')->name('favorites');

    Route::get('/create', 'ContactsController@create')->name('create');
    Route::post('/store', 'ContactsController@store')->name('store');
    Route::get('/add-to-favorite/{contact_id}', 'ContactsController@addToFavorite')->name('addToFavorite');
    Route::get('/remove-to-favorite/{contact_id}', 'ContactsController@removeToFavorite')->name('removeToFavorite');
    
    Route::get('/delete/{contact_id}', 'ContactsController@delete')->name('delete');
});

