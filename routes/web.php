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
Route::group(['middleware' => 'loggedin'], function() {
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/getmenulist/{usertypeid}','UserTypeController@getMenuList');
Route::get('/auth/logout','AuthController@logout');

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

//Product Category
Route::get('/product-category/list','ProductCategoryController@showList');
Route::get('/product-category/list-data','ProductCategoryController@listData');
Route::resource('/product-category','ProductCategoryController');

//Product Type
Route::get('/product-type/list','ProductTypeController@showList');
Route::get('/product-type/list-data','ProductTypeController@listData');
Route::resource('/product-type','ProductTypeController');

//Product
Route::get('/product/list','ProductController@showList');
Route::get('/product/list-data','ProductController@listData');
Route::resource('/product','ProductController');

//Expert Type
Route::get('/expert-type/list','ExpertTypeController@showList');
Route::get('/expert-type/list-data','ExpertTypeController@listData');
Route::resource('/expert-type','ExpertTypeController');

//Staff Info
Route::get('/staff-info/list','StaffInfoController@showList');
Route::get('/staff-info/list-data','StaffInfoController@listData');
Route::delete('/staff-info/remove-spec/{id}','StaffInfoController@removeSpecRow');
Route::resource('/staff-info','StaffInfoController');
Route::post('/staff-info/staff-spec','StaffInfoController@specRecord');
Route::get('staff-info/{staffid}/specialization','StaffInfoController@getSpecializationOfStaff');

//Client Organization Type
Route::get('/client-orgtype/list','ClientOrgTypeController@showList');
Route::get('/client-orgtype/list-data','ClientOrgTypeController@listData');
Route::resource('/client-orgtype','ClientOrgTypeController');

// Client Organization
Route::get('/client-org/list','ClientOrgController@showList');
Route::get('/client-org/list-data','ClientOrgController@listData');
Route::resource('/client-org','ClientOrgController');

//Client Post
Route::get('/client-post/list','ClientPostController@showList');
Route::get('/client-post/list-data','ClientPostController@listData');
Route::resource('/client-post','ClientPostController');

//Focal Person
Route::get('/focal-person/list','FocalPersonController@showList');
Route::get('/focal-person/list-data','focalPersonController@listData');
Route::resource('/focal-person','FocalPersonController');

//Report List
Route::get('/report/employee-list','ReportController@employeeList');
Route::get('/report/participant-list','ReportController@participantList');
Route::post('/report/search-participant-list','ReportController@searchParticipantList');
Route::get('/report/participant-count', 'ReportController@participantCount');
Route::post('/report/get-employee', 'ReportController@getEmployee');

//User Type
Route::get('/user-type/list','UserTypeController@showList');
Route::get('/user-type/list-data','UserTypeController@listData');
Route::post('/user-type/manage-permission','UserTypeController@managePermission');
Route::resource('/user-type','UserTypeController');

//Users
Route::put('users/update-change-password/{userid}','UsersController@storeChangePassword');
Route::get('/users/list','UsersController@showList');
Route::get('/users/list-data','UsersController@listData');
Route::get('users/change-password','UsersController@changePasswordIndex');
Route::resource('/users','UsersController');

Route::get('/menusetup/list','MenuSetupController@showList');
Route::get('menusetup/list-data','MenuSetupController@listData');
Route::resource('/menusetup','MenuSetupController');
});
Route::group(['middleware' => 'loggedout'], function() {

Route::get('/auth','AuthController@index');
Route::post('/auth/login','AuthController@login');

});