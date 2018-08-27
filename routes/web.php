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

Route::get('/', 'HomeController@index');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/arrivals', 'ArrivalController@index');
Route::get('/arrivals/create', 'ArrivalController@create');
Route::post('/arrivals', 'ArrivalController@store');
Route::get('/arrivals/{arrival}/edit', 'ArrivalController@edit');
Route::post('/arrivals/{arrival}', 'ArrivalController@update');
Route::post('/arrivals/{id}/delete', 'ArrivalController@destroy');

Route::get('/suppliers', 'SupplierController@index');
Route::get('/suppliers/create', 'SupplierController@create');
Route::post('/suppliers', 'SupplierController@store');
Route::get('/suppliers/{supplier}', 'SupplierController@show');
Route::post('/suppliers/{supplier}', 'SupplierController@update');
Route::post('/suppliers/{supplier}/delete', 'SupplierController@destroy');