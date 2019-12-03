<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login','Auth\ApiLoginController@login');
Route::get('projects-by-status','ProjectController@getByStatus');
Route::get('related-projects','ProjectController@getByRelated');
Route::post('donate','PaymentTransactionController@store');
Route::post('upload-photo','ProjectAssetController@store');
Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'Auth\ApiLoginController@logout');
    
});