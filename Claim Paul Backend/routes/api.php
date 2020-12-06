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
Route::get('/get_driver_history/{email}','App\Http\Controllers\viewController@getHistory');

Route::get('/report','App\Http\Controllers\reportController@getReport');
Route::post('/put_report','App\Http\Controllers\reportController@putReport');
Route::get('/get_report/{id}','App\Http\Controllers\reportController@getOneReport');
Route::put('/edit_report/{id}','App\Http\Controllers\reportController@editReport');
Route::put('/delete_report/{id}','App\Http\Controllers\reportController@deleteReport');
Route::get('/filter_report_id/{filterItem}','App\Http\Controllers\reportController@filterReportById');
Route::get('/filter_report_description/{filterItem}','App\Http\Controllers\reportController@filterReportByDescription');
Route::get('/filter_report_date/{filterItem}','App\Http\Controllers\reportController@filterReportByDate');
Route::get('/filter_report_vehicleNumber/{filterItem}','App\Http\Controllers\reportController@filterReportByVehicleNumber');
Route::get('/filter_report_place/{filterItem}','App\Http\Controllers\reportController@filterReportByPlace');
Route::get('/filter_report_adminId/{filterItem}','App\Http\Controllers\reportController@filterReportByAdmin');
Route::get('/filter_report_agentId/{filterItem}','App\Http\Controllers\reportController@filterReportByAgent');


Route::get('/policy-holder','App\Http\Controllers\viewController@policyHolderShow');
Route::get('/agents','App\Http\Controllers\viewController@agentsShow');
Route::get('/get_agent/{email}','App\Http\Controllers\viewController@aAgentShow');
Route::get('/get_policyholder/{email}','App\Http\Controllers\viewController@aPolicyholderShow');
Route::get('/get_admin/{email}','App\Http\Controllers\viewController@aAdminShow');
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

//spare parts
Route::get('/get_spare_parts','App\Http\Controllers\sparePartController@getSparePart');

// //shops
// Route::get('/get_shops','App\Http\Controllers\shopController@getShops');

//garages
Route::get('/get_garages','App\Http\Controllers\garageController@getGarages');
Route::post('/add_garage','App\Http\Controllers\garageController@addGarage');
Route::put('/edit_garage/{id}','App\Http\Controllers\garageController@editGarage');
Route::put('/delete_garage/{id}','App\Http\Controllers\garageController@deleteGarage');
Route::get('/get_garageimage/{id}','App\Http\Controllers\garageController@getOneImage');

Route::get('/get_user/{email}','App\Http\Controllers\loginController@getUserProfile');


Route::post('/send_mail','App\Http\Controllers\mailController@sendMail');