<?php

use App\Http\Controllers\Admin\AdController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::get('ads', 'ProfileController@ads')->name('profile.ads');
    Route::get('edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('edit', 'ProfileController@update')->name('profile.update');
});

Route::post('search', 'AdController@search')->name('search');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('index');
    Route::resource('users', 'Admin\UserController');
    Route::resource('ads', 'Admin\AdController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('types', 'Admin\TypeController');
});
