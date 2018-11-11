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
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::put('/user', 'UserController@update');
    Route::get('/user/edit', 'UserController@edit')->name('user.edit');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/settings/edit', 'SettingsController@edit')->name('settings.edit');
});

