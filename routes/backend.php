<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect()->action('Backend\CarController@index');
})->name('admin');

// Новости
Route::get('news', 'NewsController@index');
Route::get('news/form/{id?}', 'NewsController@form');
Route::post('news/form/{id?}', 'NewsController@save');
Route::get('news/delete/{id}', 'NewsController@delete');

Route::get('/is-compact', 'PageController@iscompact')->name('is_compact');

// Страницы
Route::get('page', 'PageController@index');
Route::get('page/form/{id?}', 'PageController@form');
Route::post('page/form/{id?}', 'PageController@save');
Route::get('page/delete/{id}', 'PageController@delete');
Route::get('/filemanager', 'PageController@fm');

// Галерея
Route::get('gallery', 'GalleryController@index');
Route::get('gallery/form/{id?}', 'GalleryController@form');
Route::post('gallery/form/{id?}', 'GalleryController@save');
Route::get('gallery/delete/{id}', 'GalleryController@delete');

// Автомобил
Route::get('car', 'CarController@index');
Route::get('car/form/{id?}', 'CarController@form');
Route::post('car/form/{id?}', 'CarController@save');
Route::get('car/delete/{id}', 'CarController@delete');
Route::get('car/colors/{id}', 'CarController@colors');
Route::post('car/colors/{id}', 'CarController@handleColors');
Route::get('car/delete-color/{id}', 'CarController@deleteColor');

// Автосервис
Route::get('autoservice', 'AutoserviceController@index');
Route::get('autoservice/form/{id?}', 'AutoserviceController@form');
Route::post('autoservice/form/{id?}', 'AutoserviceController@save');
Route::get('autoservice/delete/{id}', 'AutoserviceController@delete');

// Акции и спецпредложения
Route::get('promotion', 'PromotionController@index');
Route::get('promotion/form/{id?}', 'PromotionController@form');
Route::post('promotion/form/{id?}', 'PromotionController@save');
Route::get('promotion/delete/{id}', 'PromotionController@delete');
Route::post('promotion/status/{id}', 'PromotionController@status');

// FAQ
Route::get('faq', 'FaqController@index');
Route::get('faq/form/{id?}', 'FaqController@form');
Route::post('faq/form/{id?}', 'FaqController@save');
Route::get('faq/delete/{id}', 'FaqController@delete');

// Характеристики
Route::get('feature', 'FeatureController@index');
Route::get('feature/form/{id?}', 'FeatureController@form');
Route::post('feature/form/{id?}', 'FeatureController@save');
Route::get('feature/delete/{id}', 'FeatureController@delete');

// Груп Тех. Характеристики
Route::get('feature-group', 'FeatureGroupController@index');
Route::get('feature-group/form/{id?}', 'FeatureGroupController@form');
Route::post('feature-group/form/{id?}', 'FeatureGroupController@save');
Route::get('feature-group/delete/{id}', 'FeatureGroupController@delete');

// Опции
Route::get('option', 'OptionController@index');
Route::get('option/form/{id?}', 'OptionController@form');
Route::post('option/form/{id?}', 'OptionController@save');
Route::get('option/delete/{id}', 'OptionController@delete');

// Позиция
Route::get('position/{car_id}', 'PositionController@index');
Route::get('position/form/{car_id}/{id?}', 'PositionController@form');
Route::post('position/form/{car_id}/{id?}', 'PositionController@save');
Route::get('position/delete/{id}', 'PositionController@delete');

// Слайдер
Route::get('slider', 'SliderController@index');
Route::get('slider/form/{id?}', 'SliderController@form');
Route::post('slider/form/{id?}', 'SliderController@save');
Route::get('slider/delete/{id}', 'SliderController@delete');

// Пользователи
Route::get('user', 'UserController@index');
Route::get('user/form/{id?}', 'UserController@form');
Route::post('user/form/{id?}', 'UserController@save');
Route::get('user/delete/{id}', 'UserController@delete');