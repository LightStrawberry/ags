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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/item/{tag}','ItemController@item_by_tag');

Route::get('/admin','ItemController@index');

Route::get('/admin/add_item','admin\ItemController@add_item');
Route::post('/admin/add_item','admin\ItemController@add_item_post');

Route::get('/admin/add_tag','admin\ItemController@add_tag');
Route::post('/admin/add_tag','admin\ItemController@add_tag_post');
