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
Route::post('/get-info', 'HomeController@contact');

// Listings
Route::get('/san-pham/{name}/{id}', 'ListingsController@index');
Route::get('/phong-cach', 'ListingsController@listing_style');
Route::get('/du-an', 'ListingsController@listing_project');
Route::get('/tin-tuc', 'ListingsController@listing_blog');
Route::get('/tuyen-dung', 'ListingsController@listing_rec');

// Detail
Route::get('/phong-cach/{slug}', 'DetailController@listing_style_detail');
Route::get('/tin-tuc/{slug}', 'DetailController@blog');
Route::get('/tuyen-dung/{slug}', 'DetailController@blog');

Route::get('/lien-he', function () {
    return view('contact');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
