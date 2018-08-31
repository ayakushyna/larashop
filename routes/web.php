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
Route::post('/arrivals', 'ArrivalController@store')->name('arrivals.store');
Route::post('/arrivals/{arrival}', 'ArrivalController@update')->name('arrivals.update');
Route::post('/arrivals/{arrival}/delete', 'ArrivalController@delete');

Route::get('/departures', 'DepartureController@index');
Route::post('/departures', 'DepartureController@store')->name('departures.store');
Route::post('/departures/{departure}', 'DepartureController@update')->name('departures.update');
Route::post('/departures/{departure}/delete', 'DepartureController@delete');

Route::get('/suppliers', 'SupplierController@index');
Route::post('/suppliers', 'SupplierController@store')->name('suppliers.store');
Route::get('/suppliers/{supplier}', 'SupplierController@show');
Route::post('/suppliers/{supplier}', 'SupplierController@update')->name('suppliers.update');
Route::post('/suppliers/{supplier}/delete', 'SupplierController@delete');

Route::get('/buyers', 'BuyerController@index');
Route::post('/buyers', 'BuyerController@store')->name('buyers.store');
Route::get('/buyers/{buyer}', 'BuyerController@show');
Route::post('/buyers/{buyer}', 'BuyerController@update')->name('buyers.update');
Route::post('/buyers/{buyer}/delete', 'BuyerController@delete');

Route::get('/products/{product}', 'ProductController@show');
Route::post('/products/{product}', 'ProductController@update')->name('products.update');

Route::get('/storages/{storage}', 'StorageController@show');