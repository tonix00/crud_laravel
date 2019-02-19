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


// --------- Admin route here. --------------//
Route::get('/logout', 'LoginsController@logout');
Route::get('/login', 'LoginsController@getLoginPage');
Route::post('/checkLogin', 'LoginsController@checkLogin');


// --------- only for login user ----------//
Route::group(['middleware' => ['auth']], function() {
    
    // get method
    Route::get('/post', 'PagesController@getPost');
    Route::get('/editable/{id}', 'PagesController@viewEditablePost');
    Route::get('/delete/{id}', 'PagesController@delete');
    Route::get('/', 'PagesController@index');

    // post method
    Route::post('/addpost', 'PagesController@addPost');
    Route::post('/editpost/{id}', 'PagesController@editPost');
});