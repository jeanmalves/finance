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

    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories', 'CategoryController@store');
    Route::get('/categories/{id}', 'CategoryController@show');
    Route::get('/categories/{id}/edit', 'CategoryController@edit');
    Route::put('/categories/{id}', 'CategoryController@update');
    Route::delete('/categories/{id}', 'CategoryController@destroy');
});

