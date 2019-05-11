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

Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/register', 'AuthController@getRegister')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@postRegister')->middleware('guest');
Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postLogin')->middleware('guest');

Route::group(['prefix' => 'laradmin', 'middleware' => 'auth'], function () {
	Route::get('/', function () {
		return view('admin.index');
	})->name('admin.index');

	Route::get('/logout', 'AuthController@logout')->name('logout');

	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
});