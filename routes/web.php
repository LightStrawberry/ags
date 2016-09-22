<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/tag/{tag}','ShopController@shop_by_tag');
Route::get('/shop/{id}','ShopController@shop_info');

Route::get('/','ShopController@index');
Route::get('/admin','Admin\ShopController@index');

Route::get('/admin/add_shop','Admin\ShopController@add_shop');
Route::post('/admin/add_shop','Admin\ShopController@add_shop_post');
Route::get('/admin/edit_shop/{id}','Admin\ShopController@edit_shop');
Route::post('/admin/edit_shop/{id}','Admin\ShopController@edit_shop_post');
Route::get('/admin/add_shop_image/{id}','Admin\ShopController@add_shop_image');
Route::post('/admin/add_shop_image/{id}','Admin\ShopController@add_shop_image_post');
Route::get('/admin/del_shop/{id}','Admin\ShopController@del_shop');

Route::get('/admin/tag','Admin\ShopController@tag');
Route::get('/admin/add_tag','Admin\ShopController@add_tag');
Route::post('/admin/add_tag','Admin\ShopController@add_tag_post');
Route::get('/admin/del_tag/{id}','Admin\ShopController@del_tag');

Route::get('/admin/add_category','Admin\ShopController@add_category');
Route::post('/admin/add_category','Admin\ShopController@add_category_post');
Route::get('/admin/del_category/{id}','Admin\ShopController@del_category');

Auth::routes();

Route::get('/home', 'HomeController@index');
