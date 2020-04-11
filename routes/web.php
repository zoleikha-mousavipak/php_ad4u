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

Route::get('/', 'IndexController@index')->name('welcome');

Auth::routes();
Route::resource('ads', 'AdController');

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('ads', 'ProfileController@ads')->name('profile.ads');
});
