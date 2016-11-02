<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/upload/{id}', 'UploadController@index');
Route::post('/upload/store', 'UploadController@store');

Route::get('/photos', 'PhotosController@index');
Route::get('/photos/vote/{id}', 'PhotosController@vote');
Route::get('/photos/{id}', 'PhotosController@show');

Route::get('/myphoto/{id}', 'AccountController@index');
Route::get('/myphoto/delete/{id}', 'AccountController@delete');

Route::get('webdevex.int/webdevex/public/photos',  'PhotosController@index');

Route::get('/mail', 'HomeController@mail');

Auth::routes();

Route::get('/protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::get('/manage', 'AdminController@index');
Route::get('/manage/{id}', 'AdminController@details');
Route::get('/manage/delete/{id}', 'AdminController@delete');
Route::get('/manage/disqualify/{id}', 'AdminController@disqualify');
Route::get('/manage/contest/settings', 'AdminController@settings');
Route::post('/manage/contest/settings/update/{id}', 'AdminController@updateSettings');

Route::get('/test', 'TestController@index');