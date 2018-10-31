<?php

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
    return view('dashboard');
});
//Country
Route::get('/country/list', 'CountryController@showList');
Route::get('/country/list-data','CountryController@listData');
Route::resource('/country', 'CountryController');

//organization Type
Route::get('/org-type/list','OrgTypeController@showList');
Route::get('org-type/list-data','OrgTypeController@listData');
Route::resource('/org-type','OrgTypeController');

//Region
Route::get('/region/list','RegionController@showList');
Route::get('/region/list-data','RegionController@listData');
Route::resource('/region','RegionController');

//Zone
Route::get('/zone/list','ZoneController@showList');
Route::get('/zone/list-data','ZoneController@listData');
Route::resource('/zone','ZoneController');

//District
Route::get('/district/list','DistrictController@showList');
Route::get('/district/list-data','DistrictController@listData');
Route::resource('/district','DistrictController');

//Municipality
Route::get('/municipality/list','MunicipalityController@showList');
Route::get('/municipality/list-data','MunicipalityController@listData');
Route::resource('/municipality','MunicipalityController');

//Post
Route::get('/post/list','PostController@showList');
Route::get('/post/list-data','PostController@listData');
Route::resource('/post','PostController');

//Organization
Route::get('/organization/list','OrganizationController@showList');
Route::get('/organization/list-data','OrganizationController@listData');
Route::resource('/organization','OrganizationController');
