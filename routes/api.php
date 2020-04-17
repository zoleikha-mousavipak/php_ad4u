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

Route::prefix('ads')->name('api.ads.')->group(function () {
    Route::get('/', 'Api\AdController@index')->name('index');
    Route::get('{id}', 'Api\AdController@ad')->name('ad');
});
