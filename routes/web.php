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

Route::resource('/category', 'CategoryController');
Route::get('category/{category}/delete', 'CategoryController@delete');

Route::resource('/items', 'ItemController');
Route::get('items/{item}/delete', 'ItemController@delete');

Route::get('/filters/create', 'FilterController@create');
Route::post('/filters', 'FilterController@report');
