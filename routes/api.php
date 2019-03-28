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
//ReadFacilityControllerのエンドポイント
Route::get('/action/facilities/', 'ReadFacilityController@getFacilityRecords');
//ReadFacilityMetaControllerのエンドポイント
Route::get('/action/facilityMetas', 'ReadFacilityMetaController@getFacilityMetaRecords');
Route::get('/action/facilityMetas/type', 'ReadFacilityMetaController@getFacilityMetaRecordsByType');
Route::post('action/facilityMetas', 'CreateFacilityMetaController@createRecords');

//ReadUserControllerのエンドポイント
Route::get('/action/users/', 'ReadUserController@getUserRecords');
//ReadUserMetaControllerのエンドポイント
Route::get('/action/userMetas/', 'ReadUserMetaController@getUserMetaRecords');
