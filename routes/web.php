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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', 'EventsController');

Auth::routes();

Route::get('/home', 'HomeController@index');


            Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
            Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
            Route::get('admin/', 'AdminController@index')->name('admin.dashboard');
            
      
  