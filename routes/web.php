<?php

use Illuminate\Support\Facades\Route;

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
// Auth
Route::group(['namespace' => 'Auth'], function() {

	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login');
	Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(
[
	'namespace' => 'Frontend',
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],
function() {


Route::get('/', 'HomeController@index')->name('home');

Route::get('contact', 'ContactController@index')->name('contact');

Route::get('show/{alais}', 'HomeController@show');

Route::get('autoservice', 'AutoserviceController@index')->name('autoservice');
Route::get('autoservice/{alias}', 'AutoserviceController@show');

Route::get('price/list', 'PriceController@index')->name('price');

Route::get('news/list', 'NewsController@index')->name('news');
Route::get('news/show/{alias}', 'NewsController@show');

Route::get('sale/list', 'SaleController@index')->name('sale');

Route::get('about', 'AboutController@index')->name('about');

Route::get('car/{alias}', 'CarController@show');
Route::get('compare', 'CarController@compare');
Route::get('position/{id?}', 'CarController@position');

});
