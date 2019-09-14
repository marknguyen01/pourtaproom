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

Route::get('/', 'HomeController@index')->name('index');
Route::post('menu/{sectionID}', 'HomeController@getItems')->name('menu');
Route::post('/book', 'HomeController@createReservation')->name('contact');
Route::get('event/{slug}', 'EventController@index')->name('event');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
