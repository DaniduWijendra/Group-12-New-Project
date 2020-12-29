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

Route::get('/driver','App\Http\Controllers\viewController@driverHistoryShow');

Route::get('/sendemail','App\Http\Controllers\mailController@index')->name('sendemail');
Route::post('/sendemail/send','App\Http\Controllers\mailController@send')->name('sendemail/send');
//  Route::get('/login/{service}', 'App\Http\Controllers\loginController@redirectToProvider');
//  Route::get('/login/{service}/callback', 'App\Http\Controllers\loginController@handleProviderCallback');