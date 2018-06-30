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
Route::get('/san-pham/{name}/{id}', 'ListingsController@index');
Route::get('/chi-tiet/{name}/{title}', 'ListingsController@detail');
Route::get('/san-pham', 'ListingsController@all');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
