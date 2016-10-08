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

Route::get('/tag/{tag}/{category?}','ShopController@shop_by_tag');
Route::get('/shop/{id}','ShopController@shop_info');
Route::get('/user','UserController@user_center');

Route::get('/','ShopController@index');
Route::get('/category','ShopController@index');
Route::get('/setpos','ShopController@setpos');
Route::get('/setpos/{id}','ShopController@select_pos');
Route::get('/admin','Admin\ShopController@index');

Route::get('/admin/shop/{id}','Admin\ShopController@shop_info');
Route::get('/admin/add_shop','Admin\ShopController@add_shop');
Route::post('/admin/add_shop','Admin\ShopController@add_shop_post');
Route::get('/admin/edit_shop/{id}','Admin\ShopController@edit_shop');
Route::post('/admin/edit_shop/{id}','Admin\ShopController@edit_shop_post');
Route::get('/admin/add_shop_image/{id}','Admin\ShopController@add_shop_image');
Route::post('/admin/add_shop_image/{id}','Admin\ShopController@add_shop_image_post');
Route::get('/admin/del_shop/{id}','Admin\ShopController@del_shop');

Route::get('/admin/add_item/{id}','Admin\ShopController@add_item');
Route::post('/admin/add_item/{id}','Admin\ShopController@add_item_post');
Route::get('/admin/del_item/{id}','Admin\ShopController@del_item');

Route::get('/admin/tag','Admin\ShopController@tag');
Route::get('/admin/add_tag','Admin\ShopController@add_tag');
Route::post('/admin/add_tag','Admin\ShopController@add_tag_post');
Route::get('/admin/del_tag/{id}','Admin\ShopController@del_tag');

Route::get('/admin/add_category','Admin\ShopController@add_category');
Route::post('/admin/add_category','Admin\ShopController@add_category_post');
Route::get('/admin/del_category/{id}','Admin\ShopController@del_category');

Route::get('/myFavs','UserController@myFavs');
Route::get('/fav/{id}','UserController@likeCreateOrDelete');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/send/{phone}', 'UserController@sendphone');
