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
Route::get('/read/facilityBasicinfo', 'ReadFacilityController@findNearFacilityByFacilityType');
Route::post('/createFacility', 'CreateFacilityController@createRecord');




//ReadFacilityMetaControllerのエンドポイント
// Route::get('/facilityMetas', 'ReadFacilityMetaController@getFacilityMetaRecords');
// Route::get('/facilityMetas/type', 'ReadFacilityMetaController@getFacilityMetaRecordsByType');
// Route::post('/facilityMetas', 'CreateFacilityMetaController@createRecords');

// //ReadUserControllerのエンドポイント
// Route::get('/read/action/users/', 'ReadUserController@getUserRecords');
// //ReadUserMetaControllerのエンドポイント
// Route::get('/read/action/userMetas/', 'ReadUserMetaController@getUserMetaRecords');
