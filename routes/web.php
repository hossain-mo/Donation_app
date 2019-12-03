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
Route::get('/', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'login',
]);
Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');

});
Route::group(['prefix' => 'admin','middleware' => ['auth'],'namespace' => 'Admin'],function(){
    Route::resource('dashboard', 'DashboardController');
});
Route::group(['prefix' => 'admin','middleware' => ['auth']],function(){
    //users
    Route::get('/users-view', 'UserController@view')->name('users-view');
    Route::get('/users', 'UserController@index')->name('user-list');
    Route::post('/add-user', 'UserController@store')->name('add-user');
    Route::put('/users/{userId}', 'UserController@update');
    Route::delete('/users/{userId}', 'UserController@destroy');

    //roles
    Route::get('/roles-view', 'RoleController@view')->name('roles-view');
    Route::get('/roles', 'RoleController@index')->name('role-list');
    Route::post('/add-role', 'RoleController@store')->name('add-role');
    Route::put('/roles/{roleId}', 'RoleController@update');
    Route::delete('/roles/{roleId}', 'RoleController@destroy');

    //country
    Route::get('/countries-view', 'CountryController@view')->name('countries-view');
    Route::get('/countries', 'CountryController@index')->name('country-list');
    Route::post('/add-country', 'CountryController@store')->name('add-country');
    Route::put('/countries/{countryId}', 'CountryController@update');
    Route::delete('/countries/{countryId}', 'CountryController@destroy');

    //village
    Route::get('/villages-view', 'VillageController@view')->name('villages-view');
    Route::get('/villages', 'VillageController@index')->name('village-list');
    Route::post('/add-village', 'VillageController@store')->name('add-village');
    Route::put('/villages/{villageId}', 'VillageController@update');
    Route::delete('/villages/{villageId}', 'VillageController@destroy');

    //project category
    Route::get('/project-categories-view', 'ProjectCategoryController@view')->name('project-categories-view');
    Route::get('/project-categories', 'ProjectCategoryController@index')->name('project-category-list');
    Route::post('/add-project-category', 'ProjectCategoryController@store')->name('add-project-category');
    Route::put('/project-categories/{projectCategoryId}', 'ProjectCategoryController@update');
    Route::delete('/project-categories/{projectCategoryId}', 'ProjectCategoryController@destroy');

    //project
    Route::get('/projects-view', 'ProjectController@view')->name('projects-view');
    Route::get('/projects', 'ProjectController@index')->name('project-list');
    Route::post('/add-project', 'ProjectController@store')->name('add-project');
    Route::put('/projects/{projectCategoryId}', 'ProjectController@update');
    Route::delete('/projects/{projectCategoryId}', 'ProjectController@destroy');

    //donation
    Route::get('/projects-donation-view', 'PaymentTransactionController@view')->name('projects-donation-view');
    Route::get('/projects-donation', 'PaymentTransactionController@index')->name('projects-donation-list');

    //switch language api
    Route::get('/swith-locale','LanguageController@switchLang');
    Route::get('/get-locale','LanguageController@getLocale');

    //upload project assets
    //donation
    Route::get('/projects-asstes-view', 'ProjectAssetController@view')->name('projects-asstes-view');
    Route::get('/projects-asstes', 'ProjectAssetController@index')->name('projects-asstes');
    Route::delete('/projects-asstes/{id}', 'ProjectAssetController@destroy');
    Route::post('/upload-project-assets', 'ProjectAssetController@store')->name('upload-project-assets');
});