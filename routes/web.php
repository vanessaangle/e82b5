<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. No       w create something great!
|
*/
Route::get('/','HomeController@index');

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){
    Route::get('/login','LoginController@showLoginForm')->name('admin.auth.login');
    Route::post('/login','LoginController@login')->name('admin.auth.login');
    Route::get('/logout','LoginController@logout')->name('admin.auth.logout');
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::get('/user/profile','UserController@profile')->name('user.profile');
        Route::resources([
            '/user' => 'UserController'
        ]); 
    });
});

Route::get('/home', 'HomeController@index')->name('home');
