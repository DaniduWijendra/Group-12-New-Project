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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/searchDriver', [
//     'as' => 'api.searchDriver',
//     'uses' => 'Api\SearchController@searchDriver'
// ]);

//auth routes
Route::post('/login','App\Http\Controllers\loginController@login');
Route::get('/get_login/{email}','App\Http\Controllers\loginController@getLogin');
Route::post('/register','App\Http\Controllers\registerController@register');
Route::post('/logout','App\Http\Controllers\loginController@logout');
Route::post('/send_token','App\Http\Controllers\loginController@sendToken');
Route::post('/validate_token','App\Http\Controllers\loginController@validateToken');
Route::post('/reset_password','App\Http\Controllers\loginController@resetPassword');

//use to login with {service}
Route::group(['middleware' => ['web']], function ($service) {
    // your routes here
    Route::get('/login/{service}', 'App\Http\Controllers\loginController@redirectToProvider');
    Route::get('/login/{service}/callback', 'App\Http\Controllers\loginController@handleProviderCallback');
});
    //  Route::get('/login/{service}', 'App\Http\Controllers\loginController@redirectToProvider');
    //  Route::get('/login/{service}/callback', 'App\Http\Controllers\loginController@handleProviderCallback');

Route::get('/driver-history','App\Http\Controllers\viewController@driverHistoryShow');
Route::get('/report','App\Http\Controllers\reportController@getReport');
Route::post('/put_report','App\Http\Controllers\reportController@putReport');
Route::get('/get_report/{id}','App\Http\Controllers\reportController@getOneReport');
Route::put('/edit_report/{id}','App\Http\Controllers\reportController@editReport');
Route::put('/delete_report/{id}','App\Http\Controllers\reportController@deleteReport');
Route::get('/policy-holder','App\Http\Controllers\viewController@policyHolderShow');
Route::get('/agents','App\Http\Controllers\viewController@agentsShow');
//vehicle
Route::get('/get_vehicle','App\Http\Controllers\vehicleController@getVehicle');
Route::post('/add_vehicle','App\Http\Controllers\vehicleController@addVehicle');
Route::put('/edit_vehicle/{id}','App\Http\Controllers\vehicleController@editVehicle');
Route::put('/delete_vehicle/{id}','App\Http\Controllers\vehicleController@deleteVehicle');
Route::get('/get_image/{id}','App\Http\Controllers\vehicleController@getOneImage');
//shops
Route::get('/get_shop','App\Http\Controllers\shopController@getShops');
Route::post('/add_shops','App\Http\Controllers\shopController@addShop');
Route::put('/edit_shop/{id}','App\Http\Controllers\shopController@editShop');
Route::put('/delete_shop/{id}','App\Http\Controllers\shopController@deleteShop');
Route::get('/get_shopimage/{id}','App\Http\Controllers\shopController@getOneImage');
//Spare Part
Route::get('/get_sparepart','App\Http\Controllers\spareController@getSpare');
Route::post('/add_sparepart','App\Http\Controllers\spareController@addSpare');
Route::put('/edit_sparepart/{id}','App\Http\Controllers\spareController@editSpare');
Route::put('/delete_sparepart/{id}','App\Http\Controllers\spareController@deleteSpare');
Route::get('/get_spareimage/{id}','App\Http\Controllers\spareController@getOneImage');
//costmodel
Route::get('/getcost/{damageType}/{category}','App\Http\Controllers\vehicleController@getCost');