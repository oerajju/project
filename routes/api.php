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
Route::middleware('api')->post('/login','AuthController@login');
Route::middleware('api')->get('/product-group','ProductCategoryController@getSelectOptions');
Route::middleware('api')->get('/product','ProductController@getSelectOptions');
Route::middleware('api')->get('/product/{pcid}','ProductController@getProductFromProductGroup');
Route::middleware('api')->get('/organization','OrganizationController@getSelectOptions');
Route::middleware('api')->get('/resource-person','StaffInfoController@getSelectOptions');
Route::middleware('api')->get('/responsibility/{staffid}','StaffInfoController@getResPersonResp');
Route::middleware('api')->get('/responsibility','ExpertTypeController@getSelectOptions');
Route::middleware('api')->get('/all-product-type','ProductTypeController@getSelectOptions');
Route::middleware('api')->post('/resperson-resp','StaffInfoController@specPersonRecord');
Route::middleware('api')->post('/store-event','EventController@storeEvent');
Route::middleware('api')->post('/store-participant-form','EventController@storeParticipantForm');